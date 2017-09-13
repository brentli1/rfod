<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Movie extends Model
{
    public function categories() {
        return $this->belongsToMany('App\Category', 'movie_categories');
    }

    public function reviews() {
        return $this->hasMany('App\Review');
    }
}
