<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['user_id', 'emoji', 'star', 'ulasan', 'status', 'reviewed_by', 'reviewed_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
