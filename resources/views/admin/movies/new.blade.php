@extends('layouts.admin')

@section('content')
    <p class="lead">Create New Movie</p>

    @include('admin.partials.info-box')

    @include('admin.movies.form', [
        'movie' => $movie,
        'isNew' => true
    ])
@endsection
