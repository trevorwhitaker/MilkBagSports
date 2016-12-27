@extends('Layouts.main')

@section('content')

@section('title', ' | Milk Page Sports')

<h2 class="thosm_no_align" style="margin-left:20px;"> {{ $tag or 'All' }} Articles {{ $author or '' }}</h2>

	@foreach($posts as $post)

	<div class="main-posts">
		<div class="indiv_post">
			<img class="text-wrap" src="{{ $post->post_image}}">
			<div class="post_description">
				<h3 class="thosm_no_align" id="h3">{{ $post->title }}</h3>
				<p class="thosm_no_align"> <strong>{{ $post->author }} | {{ date('M j, Y g:i A', strtotime($post->updated_at)) }}</strong></p>
			</div>
			<a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
		</div>
	</div>
	@endforeach

@endsection