<?php

use App\Meter;
use App\Support\Concerns\CalculatesTierBasedCost;
use Illuminate\Database\Seeder;

class ConsumptionsTableSeeder extends Seeder
{
    use CalculatesTierBasedCost;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = now()->startOfMonth()->subMonth();
        $now = now();

        $meter = Meter::first();

        while ($now->gte($c)) {
            $rand = mt_rand(2, 5);

            $tillNow = $meter->consumptions()->whereBetween('created_at', [
                now()->startOfMonth(), now(),
            ])->sum('usage');

            $meter->consumptions()->create([
                'usage' => $rand,
                'cost' => $this->calculateTierBasedCost($rand, $tillNow),
                'created_at' => $c,
                'updated_at' => $c,
            ]);

            /** @var \Illuminate\Support\Carbon $c */
            $c = $c->addSeconds(mt_rand(6, 10));
        }
    }
}
