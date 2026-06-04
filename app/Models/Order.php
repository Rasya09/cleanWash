<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'mitra_laundry_id',
        'order_code',
        'status',
        'tanggal_pickup',
        'waktu_pickup',
        'alamat_pickup',
        'alamat_pengantaran',
        'foto_barang',
        'catatan',
        'alasan_gagal',
        'alasan_batal',
        'subtotal',
        'ongkir',
        'diskon',
        'total_bayar',
        'metode_bayar',
        'status_bayar',
        'berat_aktual',
    ];

    protected $casts = [
        'tanggal_pickup' => 'date',

        // tetap decimal (lebih presisi untuk uang)
        'subtotal'      => 'decimal:2',
        'ongkir'        => 'decimal:2',
        'diskon'        => 'decimal:2',
        'total_bayar'   => 'decimal:2',
        'berat_aktual'  => 'decimal:2',
    ];

    /**
     * Boot - generate order code otomatis
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->order_code = 'ORD-' . strtoupper(Str::random(5));
        });
    }

    /* ─────────────────────────────
     | RELATIONS
     ───────────────────────────── */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function mitraLaundry(): BelongsTo
    {
        return $this->belongsTo(MitraLaundry::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function statusHistories(): HasMany
    {
        return $this->hasMany(OrderStatusHistory::class)
            ->orderBy('created_at', 'desc');
    }

    /* ─────────────────────────────
     | STATUS HELPERS
     ───────────────────────────── */

    public function isMasuk(): bool
    {
        return $this->status === 'masuk';
    }

    public function isAktif(): bool
    {
        return in_array($this->status, [
            'aktif',
            'pickup',
            'diproses',
            'pengantaran'
        ]);
    }

    public function isSelesai(): bool
    {
        return $this->status === 'selesai';
    }

    public function isGagal(): bool
    {
        return $this->status === 'gagal_pickup';
    }

    public function isDibatalkan(): bool
    {
        return $this->status === 'dibatalkan';
    }

    public function stepAktif(): int
    {
        return match ($this->status) {
            'aktif'        => 1,
            'pickup'       => 2,
            'diproses'     => 3,
            'pengantaran'  => 4,
            'selesai'      => 5,
            default        => 1,
        };
    }

    /* ─────────────────────────────
     | FORMAT RUPIAH (FIX WARNING)
     ───────────────────────────── */

    public function totalFormatted(): string
    {
        return 'Rp ' . number_format((float) ($this->total_bayar ?? 0), 0, ',', '.');
    }

    public function subtotalFormatted(): string
    {
        return 'Rp ' . number_format((float) ($this->subtotal ?? 0), 0, ',', '.');
    }
}