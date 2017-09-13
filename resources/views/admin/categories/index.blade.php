@extends('layouts.admin')

@section('content')
    <p class="lead">Welcome to the Categories Index Page</p>

    @include('admin.partials.info-box')

    @include('admin.categories.list', ['categories' => $categories])
@endsection
