@extends('Layouts.main')

@section('content')

@section('title', ' | Post')



		<h2 class="thosm_no_align">{{ $post->title }}</h2>

		<p class="thosm_no_align"> <strong>{{ $post->author }} | {{ date('M j, Y g:i A', strtotime($post->updated_at)) }}</strong></p>

		<hr>

		{!! $post->body !!}
		<p class=thosm_no_align> Tags: {{ implode(", ", $post->tags) }}</p>
		<br>

		<hr style="height:10px; border:none; color:#404040; background-color:#404040;" />

		<h3> Comment Section </h3>

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

@endsection