<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

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
        'store_photos'     => 'array',
        'operational_days' => 'array',
    ];

    // ── RELASI ───────────────────────────────────────────

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

    /**
     * Review memakai mitra_id → foreign key ke users.id
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'mitra_id', 'user_id');
    }

    // ── ACCESSOR ─────────────────────────────────────────

    public function getAverageRatingAttribute(): float
    {
        return round($this->reviews()->avg('rating') ?? 0, 1);
    }

    public function getStartingPriceAttribute(): ?int
    {
        return $this->activeServices()->min('base_price');
    }

    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo
            ? asset('storage/' . $this->logo)
            : null;
    }

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