<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class Category extends Model
{
    public function movies() {
        return $this->belongsToMany('App\Movie', 'movie_categories');
    }
}
