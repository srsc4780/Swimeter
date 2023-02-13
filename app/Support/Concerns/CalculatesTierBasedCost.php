<?php

namespace App\Support\Concerns;

trait CalculatesTierBasedCost
{
    protected function calculateTierBasedCost($usage, $tillNow = null)
    {
        if (! is_null($tillNow)) {
            return $this->calculateTierBasedCost($usage + $tillNow) - $this->calculateTierBasedCost($tillNow);
        }

        $total = 0;

        if ($usage > 600) {
            $total += ($usage - 600) * 10.7;
            $usage = 600;
        }

        if ($usage > 400) {
            $total += ($usage - 400) * 9.3;
            $usage = 400;
        }

        if ($usage > 300) {
            $total += ($usage - 300) * 6.02;
            $usage = 300;
        }

        if ($usage > 200) {
            $total += ($usage - 200) * 5.7;
            $usage = 200;
        }

        if ($usage > 75) {
            $total += ($usage - 75) * 5.45;
            $usage = 75;
        }

        return $total + ($usage * 4);
    }
}
