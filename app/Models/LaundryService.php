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
        'is_active',
        'is_setrika'
    ];

    protected $casts = [
        'operational_days' => 'array',
        'is_active' => 'boolean',
        'is_setrika' => 'boolean'
    ];

    public function mitra()
    {
        return $this->belongsTo(
            MitraLaundry::class,
            'mitra_laundry_id'
        );
    }
    public function getServiceNameAttribute($value)
    {
        if ($value === 'Cuci Kering' && $this->is_setrika) {
            return 'Cuci Kering + Setrika';
        }
        return $value;
    }

}
