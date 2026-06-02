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
        'address',
        'village',
        'district',
        'city',
        'province',
        'postal_code',
        'logo',
        'ktp',
        'nib',
        'npwp',
        'status',
        'rejection_reason',
        'verified_at',
        'verified_by',
    ];

    protected $casts = [
        'verified_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function storePhotos(): HasMany
    {
        return $this->hasMany(MitraStorePhoto::class);
    }

    public function businessPhotos(): HasMany
    {
        return $this->hasMany(MitraBusinessPhoto::class);
    }

    public function fileUrl(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->url($path);
        }

        return asset('storage/' . ltrim($path, '/'));
    }

    public function avatarUrl(): string
    {
        if ($logoUrl = $this->fileUrl($this->logo)) {
            return $logoUrl;
        }

        $name = urlencode($this->store_name ?: 'Mitra');

        return "https://ui-avatars.com/api/?name={$name}&background=2563eb&color=fff&size=160";
    }

    public function fullAddress(): string
    {
        $parts = array_filter([
            $this->address,
            $this->village,
            $this->district,
            $this->city,
            $this->province,
            $this->postal_code,
        ]);

        return $parts ? implode(', ', $parts) : '—';
    }

    public function statusLabel(): string
    {
        return match ($this->status) {
            'pending' => 'Menunggu Verifikasi',
            'approved' => 'Disetujui',
            'rejected' => 'Ditolak',
            'draft' => 'Draft',
            default => ucfirst($this->status),
        };
    }
}
