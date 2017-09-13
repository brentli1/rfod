@extends('layouts.admin')

@section('content')
    <p class="lead">Welcome to the {{ $movie->title }}</p>

    @include('admin.partials.info-box')

    @include('admin.movies.form', [
        'movie' => $movie,
        'isNew' => false
    ])

    @foreach($movie->reviews as $review)
        <br>{{$review->user->name}}
    @endforeach
@endsection
