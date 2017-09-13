@extends('layouts.admin')

@section('content')
    <p class="lead">Welcome to the Movies Index Page</p>

    @include('admin.partials.info-box')

    @include('admin.movies.list', ['movies' => $movies])
@endsection
