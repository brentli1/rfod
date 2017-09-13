@extends('layouts.admin')

@section('content')
    <p class="lead">Create New Review</p>

    @include('admin.partials.info-box')

    @include('admin.reviews.form', [
        'movie' => $review,
        'isNew' => true
    ])
@endsection
