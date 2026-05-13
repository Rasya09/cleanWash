<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'role',
        'password'
    ];

    protected $hidden = [
        'password',
    ];
}
