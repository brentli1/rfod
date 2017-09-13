@extends('layouts.admin')

@section('content')
    <p class="lead">Welcome to the {{ $category->name }}</p>

    @include('admin.partials.info-box')

    @include('admin.categories.form', [
        'category' => $category,
        'isNew' => false
    ])
@endsection
