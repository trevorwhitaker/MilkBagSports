@extends('Layouts.main')

@section('content')

@section('title', ' | Post')

<a href="{{ route('admin.addAuthor') }}" class="btn btn-info" style="margin-top: 15px;"">Add Author</a>

@include('Partials._postsViewTable')

@endsection