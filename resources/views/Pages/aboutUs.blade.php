@extends('Layouts.main')

@section('content')

@section('title', ' | About Us')

{{ Html::image('images/main_logo.png', 'logo', array('class' => 'logo_aboutus')) }}

<h2 class="thosm_no_align" style="padding-top:50px"> About Us </h2>
<p style="padding-top:10px">
What is a milkbag you say? Literally, it’s a bag filled with milk. But for us, its much more. It’s a way of life, and we embrace it fully. We’re simply a bunch of good ole Canadian boys giving the hottest takes this side of the Arctic circle. Unapologetically Canadian, we like hard-nosed hockey, fries smothered in gravy and cheese, and Shania Twain. We have extensive years of mediocre semi-competitive experience in several sports including puck, hoops, football and baseball. One of us even has a journalism degree (so all our articles are legit). 
</p>
<br>

<h2 class="thosm_no_align" style="padding-top:10px; padding-left:40px" > Our Authors </h2>


<div class= "authors">
	{{ Html::image('images/Gagan8767.jpg', 'logo', array('class' => 'author_pic')) }}
	<div class="auth_desc">
	sup
	</div>
</div>
<div class= "authors">
	{{ Html::image('images/40_ORR.jpg', 'logo', array('class' => 'author_pic')) }}
	<div class="auth_desc">
	sup
	</div>
</div>
<div class= "authors">
	{{ Html::image('images/trev.JPG', 'logo', array('class' => 'author_pic')) }}
	<div class="auth_desc">
	sup
	</div>
</div>
<div class= "authors">
	{{ Html::image('images/colin.png', 'logo', array('class' => 'author_pic')) }}
	<div class="auth_desc">
	sup
	</div>
</div>



@endsection