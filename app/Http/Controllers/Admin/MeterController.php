<?php

namespace App\Http\Controllers\Admin;

use App\Http\Concerns\WorksWithModels;
use App\Http\Resources\ConsumptionResourceCollection;
use App\Meter;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class MeterController extends Controller
{
    use WorksWithModels;

    public function add(User $user)
    {
        return view('admin.meter.add')->with(compact([
            'user',
        ]));
    }

    public function create(User $user, Request $request)
    {
        $input = $this->getInputForSave($request);

        /** @var Meter $meter */
        $meter = $user->meters()->create([
            'status' => 'active',
            'uuid' => Str::uuid()->toString(),
        ]);

        $date = now()->startOfMonth()->subDay();

        $meter->consumptions()->create($input + [
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        return $this->created($meter, null, 'view', $user, $meter);
    }

    public function view(User $user, Meter $meter)
    {
        if ($user->id != $meter->user_id) {
            abort(404);
        }

        $consumptions = $meter->consumptions()->latest()->get();

        return view('admin.meter.view')->with(compact([
            'user', 'meter', 'consumptions',
        ]));
    }

    public function consumptions(User $user, Meter $meter, Request $request)
    {
        if ($request->has('start', 'end')) {
            $consumptions = $meter->consumptions()->fromStartToEnd(
                $request->get('start'), $request->get('end')
            )->get();
        } else {
            $consumptions = $meter->consumptions()->forTheLastThirtyDays()->get();
        }

        return ConsumptionResourceCollection::make($consumptions);
    }

    protected function getInputForSave(Request $request)
    {
        return $this->validate($request, [
            'usage' => 'required|integer',
            'cost' => 'required|numeric',
        ]);
    }
}
