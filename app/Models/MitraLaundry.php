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
        'service_radius',
        'pickup_fee',
    ];

    protected $casts = [
        'store_photos' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->hasMany(LaundryService::class, 'mitra_laundry_id');
    }

    public function activeServices()
    {
        return $this->hasMany(LaundryService::class, 'mitra_laundry_id')
            ->where('is_active', true);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'mitra_laundry_id');
    }

    /**
     * Hitung rata-rata rating dari reviews
     */
    public function getAverageRatingAttribute(): float
    {
        return round($this->reviews()->avg('rating') ?? 0, 1);
    }

    /**
     * Harga terendah dari semua layanan aktif
     */
    public function getStartingPriceAttribute(): ?int
    {
        return $this->activeServices()->min('base_price');
    }

    /**
     * URL lengkap untuk logo
     */
    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo ? asset('storage/' . $this->logo) : null;
    }

    /**
     * Array URL lengkap untuk store_photos
     */
    public function getStorePhotoUrlsAttribute(): array
    {
        if (empty($this->store_photos)) {
            return [];
        }

        return array_map(
            fn($photo) => asset('storage/' . $photo),
            $this->store_photos
        );
    }
}