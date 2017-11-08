<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class Image extends Model
{
    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }
}
