@extends('Layouts.main')

@section('content')

@section('title', ' | Milk Page Sports')

<h2 class="leaguePageText">{{ $post->title }}</h2>

<p class="leaguePageText"> {{ $post->author }} </p>

<p class="leaguePageText"> {{ $post->body }} </p>

<hr>

@foreach($comments as $comment)

	<div>
		<p>{{ $comment->name }}: </p>
		<p>{{ $comment->text }} </p>
	</div>
	<hr>
@endforeach

<hr>

<h2> Add a comment</h2>

<div class="row">
	<div class="col-md-2">
		{!! Form::open(array('route' => 'posts.saveComment')) !!}
			{{ Form::label('name', 'Name', array('class' => 'addLeagueText')) }}
			{{ Form::text('name', null, array('class' => 'form-control')) }}

			{{ Form::label('text', 'Comment', array('class' => 'addLeagueText')) }}
			{{ Form::textarea('text', null, array('class' => 'form-control')) }}

			{{ Form::hidden('post_id', $post->id) }}

			{{ Form::submit('Submit', array('class' => 'btn btn-primary center-block')) }}

		{!! Form::close() !!}
	</div>
</div>

@endsection