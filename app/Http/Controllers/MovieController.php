<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Movie as MovieResource;
use App\Movie;

class MovieController extends Controller
{
    public function apiMovies() {
        return MovieResource::collection(Movie::all());
    }
}
