<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConsumptionResourceCollection;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboardPage(Request $request)
    {
        if ($this->visitor->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        $usage = 0;

        foreach ($this->visitor->meters as $meter) {
            $consumptions = $meter->consumptions()->forTheLastThirtyDays()->get();
            $consumptions = ConsumptionResourceCollection::make($consumptions)->resolve($request);

            foreach ($consumptions as $consumption) {
                $usage += $consumption['usage'];
            }
        }

        return view('public.dashboard')->with([
            'energyUsage' => $usage
        ]);
    }
}
