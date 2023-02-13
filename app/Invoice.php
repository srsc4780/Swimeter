<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'amount', 'charges', 'txn_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
