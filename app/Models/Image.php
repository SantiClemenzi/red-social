<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // use HasFactory;
    protected $table = 'images';

    // relacion one to many
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('id', 'desc');
    }

    // relacion one to many
    public function like()
    {
        return $this->hasMany(Like::class);
    }

    // relacion many to one
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
