@extends('layouts.admin')

@section('content')
    <p class="lead">Welcome to the Reviews Index Page</p>

    @include('admin.partials.info-box')

    @include('admin.reviews.list', ['revies' => $reviews])
@endsection
