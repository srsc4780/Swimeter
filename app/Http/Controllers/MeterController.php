<?php

namespace App\Http\Controllers;

use App\Http\Resources\MeterResource;
use App\Meter;
use Illuminate\Http\Request;

class MeterController extends Controller
{
    public function index(Request $request)
    {
        if ($request->expectsJson()) {
            return MeterResource::collection(
                $this->visitor->meters
            );
        }

        $meters = $this->visitor->meters()->paginate();

        return view('public.meter.list')->with(compact([
            'meters',
        ]));
    }

    public function view(Meter $meter)
    {
        if ($meter->user_id != $this->visitor->id) {
            abort(403);
        }

        return view('public.meter.view')->with(compact([
            'meter',
        ]));
    }
}
