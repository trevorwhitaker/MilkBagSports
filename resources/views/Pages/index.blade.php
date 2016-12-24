@extends('Layouts.main')

@section('content')

@section('title', ' | Home')


<!-- may want to make this a courasel in (instead of a jumbotron) the future: -->
{{ Html::image('images/main_logo.png', 'logo', array('class' => 'logo')) }}



<div class="jumbotron" id="jumbotron">
	<h1 class="thosm">MILKBAG SPORTS</h1>
	<p class="thosm">By Guys, for Guys, At Guys, For Men</p>
</div>




<h2 class="thosm_no_align" style="margin-left:20px;"> Most Recent Posts </h2>
<hr>

	<div class="twitter_feed">

		<a class="twitter-timeline" href="https://twitter.com/milkbag_sports">Tweets by milkbag_sports</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

	</div>
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
		<hr>
	</div>
@endforeach
	


@endsection