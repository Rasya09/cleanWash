<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id', 'method', 'status', 'amount', 'proof', 'verified_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
