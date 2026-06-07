<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Layanan extends Model
{
    protected $table = 'layanans';

    protected $fillable = [
        'mitra_laundry_id',
        'nama',
        'kategori',
        'subkategori',
        'deskripsi',
        'harga',
        'satuan',
        'min_order',
        'estimasi_hari',
        'jam_buka',
        'jam_tutup',
        'is_active',
        'foto',
    ];

    public function mitraLaundry(): BelongsTo
    {
        return $this->belongsTo(MitraLaundry::class);
    }

    public function hargaFormatted(): string
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }
}
