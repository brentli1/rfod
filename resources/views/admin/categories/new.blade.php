@extends('layouts.admin')

@section('content')
    <p class="lead">Create New Category</p>

    @include('admin.partials.info-box')

    @include('admin.categories.form', [
        'category' => $category,
        'isNew' => true
    ])
@endsection
