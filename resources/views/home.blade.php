@extends('layouts.site')

@section('content')
    <p>This is the landing page for non admin.</p>

    <a href="{{ route('admin') }}">Admin</a>
@endsection
