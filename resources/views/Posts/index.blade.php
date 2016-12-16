@extends('Layouts.main')

@section('content')

@section('title', ' | Milk Page Sports')

<h1> All Articles </h1>

		@foreach($posts as $post)

			<div>
				<hr>
				<h3>{{ $post->title }}</h3>
				<a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
			</div>
		@endforeach

@endsection