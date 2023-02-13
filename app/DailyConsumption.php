<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyConsumption extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'usage', 'date',
    ];
}
