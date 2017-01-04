@extends('Layouts.main')

@section('content')

@section('title', ' | Home')


{{ Html::image('images/MilkBag2.jpg', 'logo', array('class' => 'logo')) }}

<div class="bs-example">
    <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol id="carousel-dots" class="carousel-indicators">
            <li class="slide-one active"></li>
            <li class="slide-two"></li>
            <li class="slide-three"></li>
        </ol>   
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">

        	<?php $cnt = 0; ?>

		    @foreach($top_posts as $post)
		    <?php
		    if ($cnt == 0){
		    	$cnt++; 
		    	?>

            <div class="active item">


            <a href="{{ route('posts.show', urlencode($post->title)) }}">
                <img src="{{ $post->post_image}}" width="100%" height="100%" alt="First Slide">
            </a>
                <div class="c_caption">
                	<a href="{{ route('posts.show', urlencode($post->title)) }}">
                		<h5 class="thosm_no_align" style="color: white">{{ $post->title }}</h5>
              	 	</a>
                </div>
            </div>

            <?php 
		 		} else {
		     ?>

            <div class="item">
            <a href="{{ route('posts.show', urlencode($post->title)) }}">
                <img src="{{ $post->post_image}}" width="100%" height="100%" alt="Second Slide">
            </a>
                <div class="c_caption">
                 	<a href="{{ route('posts.show', urlencode($post->title)) }}">
                		<h5 class="thosm_no_align" style="color: white">{{ $post->title }}</h5>
               		</a>
                </div>
            </div>

            <?php } ?>


      		@endforeach

        </div>
        <!-- Carousel controls -->
        <a class="carousel-control left">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>


<h2 class="thosm_no_align" style="margin-left:20px;"> Posts from the Past Week</h2>
<hr>

<!--

<a href="/<?php echo $week - 1 ?>" class="btn btn-primary">Previous Week</a>
<a href="/<?php echo $week + 1 ?>" class="btn btn-primary">Next Week</a>

-->

<div class="scroll main-posts">
@foreach($posts as $post)


		<div class="indiv_post">
			<img class="text-wrap" src="{{ $post->post_image}}">
			<div class="post_description">
				<h3 class="thosm_no_align" id="h3">{{ $post->title }}</h3>
				<p class="thosm_no_align"> <strong>{{ $post->author }} | {{ date('M j, Y g:i A', strtotime($post->created_at)) }}</strong></p>
			</div>
			<a href="{{ route('posts.show', urlencode($post->title)) }}" class="btn btn-primary">Read More</a>
		</div>
		<hr>
@endforeach
</div>
<div class="twitter_feed">

	<a class="twitter-follow-button"
 	 href="https://twitter.com/milkbag_sports">
	Follow @milkbag_sports</a>

		<a class="twitter-timeline" data-tweet-limit=7 href="https://twitter.com/milkbag_sports">Tweets by milkbag_sports</a> <script async src="//platform.twitter.com/widgets.js" data-tweet-limit=5 charset="utf-8"></script>



</div>


@endsection