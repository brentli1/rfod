<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Movie as MovieResource;
use App\Movie;

class MovieController extends Controller
{
    public function index() {
        $movies = Movie::orderBy('title', 'asc')->get();

        return view('admin.movies.index', [
            'movies' => $movies
        ]);
    }

    public function show($id) {
        $movie = Movie::find($id);

        return view('admin.movies.show', [
            'movie' => $movie
        ]);
    }
}
