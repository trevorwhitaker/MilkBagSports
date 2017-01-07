@extends('Layouts.main')

@section('content')

@section('title', ' | Post')

<a href="{{ route('admin.getAuthors') }}" class="btn btn-info">Manage Authors</a>

@include('Partials._postsViewTable')

@endsection