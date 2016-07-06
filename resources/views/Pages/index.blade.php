@extends('Layouts.main')

@section('content')

@section('title', ' | Milk Page Sports')

<div class-"row">
	<div class="col-md-12">
		<div class="jumbotron">
			<h1>Milk Bag Sports</h1>
			<p>This is a description for this milk bag sports.</p>
		</div>
	</div>
</div>

<h2> Most Recent Posts </h2>
<hr>

<div class-"row">
	<div class="col-md-8">
		@foreach($posts as $post)

			<div>
				<h3>{{ $post->title }}</h3>
				<a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
			</div>
			<hr>
		@endforeach
	</div>
</div>
@endsection