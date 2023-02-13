<?php

namespace App\Console\Commands;

use App\Meter;
use App\Support\Concerns\CalculatesTierBasedCost;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use React\EventLoop\Factory;
use React\Socket\ConnectionInterface;
use React\Socket\TcpServer;

class ServeTcp extends Command
{
    use CalculatesTierBasedCost;

    protected $signature = 'tcp:serve {--host=0.0.0.0 : The host address to serve the TCP socket on} {--p|port=8000 : The port to serve the TCP socket on}';

    protected $description = 'Serves a TCP socket to accept data from meters.';

    public function handle()
    {
        $loop = Factory::create();
        $socket = new TcpServer($this->uri(), $loop);

        $socket->on('connection', function (ConnectionInterface $connection) {
            $this->line("<info>New connection:</info> <{$connection->getRemoteAddress()}>");

            $connection->on('data', function ($data) use ($connection) {
                $parts = explode('|', trim($data));

                if (count($parts) != 3) {
                    $connection->write('invalid');

                    return;
                }

                [$meterId, $volts, $amps] = $parts;

                try {
                    $meter = Meter::whereUuid($meterId)->firstOrFail();
                } catch (ModelNotFoundException $e) {
                    $connection->write('device');

                    return;
                }

                $volts = hexdec($volts);
                $amps = hexdec($amps);
                $now = now();

                if ($last = optional($meter->consumptions()->latest()->first())->created_at) {
                    $timing = $now->timestamp - $last->timestamp;
                } else {
                    $timing = 10;
                }

                $tillNow = $meter->consumptions()->whereBetween('created_at', [
                    now()->startOfMonth(), now(),
                ])->sum('usage');

                $usage = ($volts * 0.0001335 * $amps * $timing) / (60 * 60 * 1000);
                $cost = $this->calculateTierBasedCost($usage, $tillNow);
                $userStatus = $meter->user->status;

                if ($userStatus->balance < $cost) {
                    if ($meter->status == 'active') {
                        $meter->status = 'disabled';
                        $meter->save();
                    }

                    $connection->write('disable');
                } else {
                    if ($meter->status == 'disabled') {
                        $meter->status = 'active';
                        $meter->save();
                    }

                    $connection->write('ok');
                }

                $meter->consumptions()->create([
                    'usage' => $usage,
                    'cost' => $cost,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);

                $userStatus->balance -= $cost;
                $userStatus->save();

                $this->line("<info>New data:</info> <comment>{$meterId}</comment>/<comment>{$usage}</comment>/<comment>{$cost}</comment>");
                $connection->end();
            });

            $connection->on('close', function () use ($connection) {
                $this->line("<info>Connection closed:</info> <{$connection->getRemoteAddress()}>");
            });
        });

        $this->line("<info>TCP server started:</info> <{$socket->getAddress()}>");
        $loop->run();
    }

    protected function uri()
    {
        return $this->host() . ':' . $this->port();
    }

    protected function host()
    {
        return $this->input->getOption('host');
    }

    protected function port()
    {
        return $this->input->getOption('port');
    }
}
