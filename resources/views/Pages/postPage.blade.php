@extends('Layouts.main')

@section('content')

@section('title', ' | Milk Page Sports')

<h2 class="leaguePageText">{{ $post->title }}</h2>

<p class="leaguePageText"> {{ $post->author }} </p>

<p class="leaguePageText"> {{ $post->body }} </p>

@endsection