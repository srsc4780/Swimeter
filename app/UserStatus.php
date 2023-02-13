<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'type', 'balance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
