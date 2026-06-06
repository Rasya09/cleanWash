<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MitraLaundry extends Model
{
    protected $table = 'mitra_laundries';

    protected $fillable = [
        'user_id',
        'owner_name',
        'store_name',
        'email',
        'phone',
        'description',
        'province',
        'city',
        'district',
        'village',
        'postal_code',
        'address',
        'logo',
        'store_photos',
        'ktp',
        'nib',
        'npwp',
        'status',
        'rejection_reason',
        'operational_days',
        'open_time',
        'close_time',
        'service_radius',
        'pickup_fee',
    ];

    protected $casts = [
        'operational_days' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->hasMany(
            LaundryService::class,
            'mitra_laundry_id'
        );
    }

}
