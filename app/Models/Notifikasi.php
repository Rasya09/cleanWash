<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    // Sesuaikan nama tabel jika di databasemu berbeda
    protected $table = 'notifikasis'; 
    
    protected $fillable = [
        'judul', 
        'pesan', 
        'modul', 
        'penerima', 
        'is_read'
    ];
}