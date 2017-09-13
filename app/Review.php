<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Movie;

class Review extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function movie() {
        return $this->belongsTo('App\Movie');
    }
}
