<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'user_id',
        'label',
        'recipient_name',
        'phone',
        'address',
        'province',
        'city',
        'postal_code',
        'latitude',
        'longitude',
        'is_primary'

    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
