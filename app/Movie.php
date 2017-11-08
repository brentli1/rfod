<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Image;
use App\Review;

class Movie extends Model
{
    public function categories() {
        return $this->belongsToMany('App\Category', 'movie_categories');
    }

    public function reviews() {
        return $this->hasMany('App\Review');
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function image()
    {
        return $this->hasMany('App\Image');
    }
}
