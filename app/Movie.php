<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Movie extends Model
{
    public function categories() {
        return $this->hasMany('App\Category');
    }
}
