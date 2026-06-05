<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Komplain extends Model
{
    protected $fillable = [
        'reporter_id',
        'reported_user_id',
        'review_id',
        'mitra_laundry_id',
        'alasan',
        'status',
        'tanggapan_admin',
    ];

    public function reporter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    public function reportedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reported_user_id');
    }

    public function review(): BelongsTo
    {
        return $this->belongsTo(Review::class);
    }

    public function mitraLaundry(): BelongsTo
    {
        return $this->belongsTo(MitraLaundry::class, 'mitra_laundry_id');
    }
}
