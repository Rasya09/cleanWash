<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Order;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'nama_layanan',
        'jenis_layanan',
        'harga_per_kg',
        'harga_satuan',
        'estimasi_berat',
        'berat_aktual',
        'qty',
        'subtotal',
    ];

    protected $casts = [
        'harga_per_kg'   => 'decimal:2',
        'harga_satuan'   => 'decimal:2',
        'estimasi_berat' => 'decimal:2',
        'berat_aktual'   => 'decimal:2',
        'subtotal'       => 'decimal:2',
    ];

    /**
     * Relasi ke Order
     *
     * @return BelongsTo<Order, OrderItem>
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Format subtotal menjadi Rupiah
     */
    public function subtotalFormatted(): string
    {
        return 'Rp ' . number_format((float) $this->subtotal, 0, ',', '.');
    }

    /**
     * Format harga menjadi Rupiah
     */
    public function hargaFormatted(): string
    {
        $harga = (float) ($this->harga_per_kg ?? $this->harga_satuan ?? 0);

        return 'Rp ' . number_format($harga, 0, ',', '.');
    }
}