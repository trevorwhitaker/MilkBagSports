@extends('Layouts.main')

@section('content')

@section('title', ' | Milk Page Sports')


<!-- may want to make this a courasel in (instead of a jumbotron) the future: -->

<div class="jumbotron" id="jumbotron">
	<h1 class="thosm">MilkBag Sports</h1>
	<p class="thosm">By Guys, for Guys, At Guys, For Men</p>
</div>




<h2> Most Recent Posts </h2>
<hr>
@foreach($posts as $post)

	<div>
		<h3>{{ $post->title }}</h3>
		<a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
	</div>
	<hr>
@endforeach


@endsection