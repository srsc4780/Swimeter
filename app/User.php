<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'phone',
        'password',
    ];

    protected $hidden = [
        'is_admin', 'password', 'remember_token',
    ];

    protected $with = [
        'status', 'address',
    ];

    public function address()
    {
        return $this->hasOne(UserAddress::class);
    }

    public function status()
    {
        return $this->hasOne(UserStatus::class);
    }

    public function meters()
    {
        return $this->hasMany(Meter::class);
    }

    public function consumptions()
    {
        return $this->hasMany(Consumption::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
