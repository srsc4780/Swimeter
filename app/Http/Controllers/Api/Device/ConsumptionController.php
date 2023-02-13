<?php

namespace App\Http\Controllers\Api\Device;

use App\Meter;
use App\Support\Concerns\CalculatesTierBasedCost;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class ConsumptionController extends Controller
{
    use CalculatesTierBasedCost;

    public function saveConsumption(Request $request)
    {
        try {
            $meter = Meter::whereUuid(
                $request->get('device_id')
            )->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'device'
            ]);
        }

        try {
            $input = $this->validate($request, [
                'usage' => 'required|numeric',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'invalid',
            ]);
        }

        $tillNow = $meter->consumptions()->whereBetween('created_at', [
            now()->startOfMonth(), now(),
        ])->sum('usage');

        $usage = floatval($input['usage']);
        $input['cost'] = $this->calculateTierBasedCost($usage, $tillNow);
        $userStatus = $meter->user->status;

        if ($userStatus->balance < $input['cost']) {
            if ($meter->status == 'active') {
                $meter->status = 'disabled';
                $meter->save();
            }

            return response()->json([
                'status' => 'disable',
            ]);
        }

        if ($meter->status == 'disabled') {
            $meter->status = 'active';
            $meter->save();
        }

        $meter->consumptions()->create($input);

        $userStatus->balance -= $input['cost'];
        $userStatus->save();

        return response()->json([
            'status' => 'success',
        ]);
    }
}
