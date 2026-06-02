<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MitraStorePhoto extends Model
{
    protected $table = 'mitra_store_photos';

    protected $fillable = [
        'mitra_laundry_id',
        'photo',
    ];

    public function mitraLaundry(): BelongsTo
    {
        return $this->belongsTo(MitraLaundry::class);
    }
}
