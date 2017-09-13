<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Movie as MovieResource;
use App\Movie;

class MovieController extends Controller
{
    public function index() {
        $movies = Movie::orderBy('name', 'asc')->get();

        return view('admin.movies.index', [
            'movies' => $movies
        ]);
    }
}
