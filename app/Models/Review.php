<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'user_id',
        'mitra_id',
        'order_id',
        'rating',
        'komentar',
        'status',
        'approved_by',
        'approved_at'
    ];

    protected $casts = [
        'approved_at' => 'datetime',
        'rating' => 'integer',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mitra()
    {
        return $this->belongsTo(MitraLaundry::class, 'mitra_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
