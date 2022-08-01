<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function isFavorited()
    {
        return $this->hasOne(Favorite::class)->where('user_id', auth()->user()->id);
    }

    public function favoriteCount()
    {
        return $this->hasMany(Favorite::class);
    }
}
