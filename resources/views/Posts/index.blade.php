@extends('Layouts.main')

@section('content')

@section('title', ' | Milk Page Sports')

<h1> {{ $tag or 'All' }} Articles </h1>

		@foreach($posts as $post)

			<div>
				<hr>
				<h3>{{ $post->title }}</h3>
				<p class="leaguePageText"> <strong>{{ $post->author }} | {{ date('M j, Y g:i A', strtotime($post->updated_at)) }}</strong></p>
				<a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
			</div>
		@endforeach

@endsection