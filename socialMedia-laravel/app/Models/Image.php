<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // use HasFactory;
    protected $table = 'images';

    // relacion one to many
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    // relacion one to many
    public function like(){
        return $this->hasMany('App\Like');
    }

    // relacion many to one
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    
}
