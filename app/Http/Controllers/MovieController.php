<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Movie as MovieResource;
use App\Movie;
use App\Category;

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
        $categories = Category::pluck('name', 'id');

        return view('admin.movies.show', [
            'movie' => $movie,
            'categories' => $categories
        ]);
    }

    public function new() {
        $movie = new Movie();
        $categories = Category::pluck('name', 'id');

        return view('admin.movies.new', [
            'movie' => $movie,
            'categories' => $categories
        ]);
    }

    public function create(Request $request) {
        $this->validateMovie($request);

        $movie = new Movie();
        $movie = $this->saveMovieValues($movie, $request);
        $movie->categories()->attach($request->categories);

        return redirect()->route('admin.movies.show', ['id' => $movie->id])->with([
            'success' => 'Movie Added!'
        ]);
    }

    public function edit(Request $request, $id) {
        $this->validateMovie($request);

        $movie = Movie::find($id);
        $movie = $this->saveMovieValues($movie, $request);
        $movie->categories()->sync($request->categories);

        return redirect()->back()->with([
            'success' => 'Movie updated!'
        ]);
    }

    public function delete($id) {
        $movie = Movie::find($id);
        $movie->categories()->detach();
        $movie->delete();

        return redirect()->route('admin.movies.index')->with([
            'success' => 'Movie removed!'
        ]);
    }

    private function validateMovie($request) {
        $this->validate($request, [
            'title' => 'required'
        ]);
    }

    private function saveMovieValues($movie, $request) {
        $movie->title = $request->title;
        $movie->director = $request->director;
        $movie->synopsis = $request->synopsis;
        $movie->release_date = $request->release_date;
        $movie->save();

        return $movie;
    }
}
