<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'role',
        'status',
        'password'

    ];



    protected $hidden = [
        'password',
        'remember_token'

    ];
    
    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function mitraLaundry()
    {
        return $this->hasOne(MitraLaundry::class);
    }
}

