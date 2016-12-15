@extends('Layouts.main')

@section('content')

@section('title', ' | Milk Page Sports')


<!-- may want to make this a courasel in (instead of a jumbotron) the future: -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<h1>MilkBag Sports</h1>
				<p>This is a description for this milk bag sports.</p>
			</div>
		</div>
	</div>
</div>





<div class="container">


<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h2> Most Recent Posts </h2>
			<hr>
			@foreach($posts as $post)

				<div>
					<h3>{{ $post->title }}</h3>
					<a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
				</div>
				<hr>
			@endforeach
		</div>
		<div class="col-md-3 col-md-offset-1">
			<h2>Sidebar</h2>
		</div>
	</div>


</div>
@endsection