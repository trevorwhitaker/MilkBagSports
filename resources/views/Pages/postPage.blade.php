@extends('Layouts.main')

@section('content')

@section('title', ' | Milk bag Sports')

<h2 class="leaguePageText">{{ $post->title }}</h2>

<p class="leaguePageText"> {{ $post->author }} </p>

{!! $post->body !!}

<hr style="height:10px; border:none; color:#404040; background-color:#404040;" />

<h3> Comments Section </h3>

@foreach($comments as $comment)

<div>
	<p>{{ $comment->name }}: </p>
	<p>{{ $comment->text }} </p>
</div>
<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseComment{{$comment->id}}" aria-expanded="false" aria-controls="collapseComment{{$comment->id}}">
    Reply
  </a>
</p>
<div class="collapse" id="collapseComment{{$comment->id}}">
	<div class="card card-block">
		@include('Partials._replyComment')
	</div>
</div>
<hr>
@endforeach

<h2> Add a comment</h2>

@include('Partials._addComment')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

@endsection