<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meter extends Model
{
    protected $fillable = [
        'status', 'uuid',
    ];

    protected $hidden = [
        'uuid',
    ];

    protected $dates = [
        'grace_period_started_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function consumptions()
    {
        return $this->hasMany(Consumption::class);
    }

    public function dailyConsumptions()
    {
        return $this->hasMany(DailyConsumption::class);
    }
}
