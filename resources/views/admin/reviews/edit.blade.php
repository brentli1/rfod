@extends('layouts.admin')

@section('content')
    <p class="lead">Welcome to the {{ $review->movie->title }} Review by {{ $review->user->name }}</p>

    @include('admin.partials.info-box')

    @include('admin.reviews.form', [
        'movie' => $review,
        'isNew' => false
    ])
@endsection
