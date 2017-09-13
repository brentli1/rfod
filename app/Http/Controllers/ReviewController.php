<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Review;
use App\Movie;

class ReviewController extends Controller
{
    public function adminIndex() {
        $reviews = Review::orderBy('created_at', 'desc')->get();

        return view('admin.reviews.index', [
            'reviews' => $reviews
        ]);
    }

    public function edit($id) {
        $review = Review::find($id);
        $movies = Movie::pluck('title', 'id');

        return view('admin.reviews.edit', [
            'review' => $review,
            'movies' => $movies
        ]);
    }

    public function new() {
        $review = new Review();
        $review->movie = new Movie();
        $movies = Movie::pluck('title', 'id');

        return view('admin.reviews.new', [
            'review' => $review,
            'movies' => $movies
        ]);
    }

    public function create(Request $request) {
        $this->validateReview($request);

        $review = new Review();

        // Check if user already made a review for the selected movie
        $this->checkExistingReview($request);

        $review = $this->saveReviewValues($review, $request);

        return redirect()->route('admin.reviews.edit', ['id' => $review->id])->with([
            'success' => 'Review Added!'
        ]);
    }

    public function update(Request $request, $id) {
        $this->validateReview($request);

        $review = Review::find($id);
        $review = $this->saveReviewValues($review, $request);

        return redirect()->back()->with([
            'success' => 'Review updated!'
        ]);
    }

    public function delete($id) {
        $review = Review::find($id);
        $review->user()->dissociate();
        $review->movie()->dissociate();
        $review->delete();

        return redirect()->route('admin.reviews.index')->with([
            'success' => 'Review removed!'
        ]);
    }

    private function validateReview($request) {
        $this->validate($request, [
            'score' => 'required',
            'review' => 'required'
        ]);
    }

    private function saveReviewValues($review, $request) {
        $review->review = $request->review;
        $review->score = $request->score;
        Movie::find($request->movie[0])->reviews()->save($review);
        Auth::user()->reviews()->save($review);
        $review->save();

        return $review;
    }

    private function checkExistingReview($request) {
        $existingReview = Movie::find($request->movie[0])->reviews()->where('user_id', Auth::user()->id)->first();
        if ($existingReview) {
            return redirect()->back()->with([
                'failure' => "You've already added a review for this movie!"
            ]);
        }
    }
}
