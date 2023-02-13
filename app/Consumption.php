<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Consumption extends Model
{
    protected $fillable = [
        'usage', 'cost',
        'created_at', 'updated_at',
    ];

    public function meter()
    {
        return $this->belongsTo(Meter::class);
    }

    public function scopeForTheLastThirtyDays(Builder $query)
    {
        $query->whereBetween('created_at', [
            now()->subMonth()->setTime(0, 0, 0),
            now()->setTime(23, 59, 59),
        ]);
    }

    public function scopeFromStartToEnd(Builder $query, $start, $end)
    {
        $query->whereBetween('created_at', [
            Carbon::createFromFormat('Y-m-d', $start)->setTime(0, 0, 0),
            Carbon::createFromFormat('Y-m-d', $end)->setTime(23, 59, 59),
        ]);
    }
}
