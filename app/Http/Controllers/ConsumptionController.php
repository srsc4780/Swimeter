<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConsumptionResourceCollection;
use App\Meter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ConsumptionController extends Controller
{
    public function index(Request $request, Meter $meter)
    {
        if ($meter->user_id != $this->visitor->id) {
            abort(403);
        }

        if ($request->has('start', 'end')) {
            $consumptions = $meter->consumptions()->fromStartToEnd(
                $request->get('start'), $request->get('end')
            )->get();
        } else {
            $consumptions = $meter->consumptions()->forTheLastThirtyDays()->get();
        }

        return ConsumptionResourceCollection::make($consumptions);
    }
}
