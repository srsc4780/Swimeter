<?php

namespace App\Http\Controllers\Api;

use App\Meter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ConsumptionResourceCollection;

class MeterController extends Controller
{
    public function consumptions(Meter $meter)
    {
        return ConsumptionResourceCollection::make($meter->consumptions);
    }
}
