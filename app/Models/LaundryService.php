<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaundryService extends Model
{
    protected $fillable = [
        'mitra_laundry_id',
        'service_name',
        'operational_days',
        'base_price',
        'estimated_days',
        'minimum_order',
        'maximum_order',
        'is_active'
    ];

    protected $casts = [
        'operational_days' => 'array',
        'is_active' => 'boolean'
    ];

    public function mitra()
    {
        return $this->belongsTo(
            MitraLaundry::class,
            'mitra_laundry_id'
        );
    }

}
