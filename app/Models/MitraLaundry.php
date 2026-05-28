<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MitraLaundry extends Model
{
    protected $fillable = [
        'user_id',
        // Step 1
        'owner_name',
        'store_name',
        'email',
        'phone',
        'description',
        // Step 2
        'address',
        'village',
        'district',
        'city',
        'province',
        'postal_code',
        // Step 3
        'logo',
        // Step 4
        'ktp',
        'nib',
        'npwp',
        'status'
    ];

    public function storePhotos()
    {
        return $this->hasMany(MitraStorePhoto::class);
    }

    public function businessPhotos()
    {
        return $this->hasMany(MitraBusinessPhoto::class);
    }
}
