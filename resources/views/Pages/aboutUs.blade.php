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
	{{ Html::image('images/scoop.PNG', 'logo', array('class' => 'author_pic')) }}
	<div class="auth_desc">
	<h4> Gagan - <a href="/posts/author/Scoop"> "Scoop"</a></h4>
	<p>He loves watching Toronto Sports more than anything else. Along with baseball analytics, he is a fan of satirical sports takes. Ironically, he doesn't have many inside scoops.</p>
	</div>
</div>
<div class= "authors">
	{{ Html::image('images/40_ORR.jpg', 'logo', array('class' => 'author_pic')) }}
	<div class="auth_desc">
	<h4> Patrick - "The Vet"</h4>
	<p>Now a general sports enthusiast, he played multiple sports growing up, but settled into hockey and baseball as time went on. An author of several bestselling books (which can be found at www.fakebooks.com), he’s nicknamed The Vet for his veteran analysis of all sports ranging from college football to lawn bowling. </p>
	</div>
</div>
<div class= "authors">
	{{ Html::image('images/trev.JPG', 'logo', array('class' => 'author_pic')) }}
	<div class="auth_desc">
	<h4> Trevor - "   "</h4>
	<p></p>
	</div>
</div>
<div class= "authors">
	{{ Html::image('images/colin.png', 'logo', array('class' => 'author_pic')) }}
	<div class="auth_desc">
	<h4> Colin - "   "</h4>
	<p>He enjoys watching full rounds of golf and eating excessive amounts of popcorn. In his spare time he stocks milk at the grocery store. </p>
	</div>
</div>
<div class= "authors">
	{{ Html::image('images/dyl.PNG', 'logo', array('class' => 'author_pic')) }}
	<div class="auth_desc">
	<h4>Dylan</h4>
	Hello I'm Dylan, I enjoy sports and leisure. I look forward to taking readers on a literary journey. Thank you for your time.
	</div>
</div>
<div class= "authors">
	{{ Html::image('images/chris.jpg', 'logo', array('class' => 'author_pic')) }}
	<div class="auth_desc">
	<h4>Chris</h4>
	Played a bunch of sports cause he couldn't concentrate on one. Now decides to watch a bunch on the couch with snacks.
	</div>
</div>
<div class= "authors">
	{{ Html::image('images/colin.png', 'logo', array('class' => 'author_pic')) }}
	<div class="auth_desc">
	sup
	</div>
</div>
<div class= "authors">
	{{ Html::image('images/unknown.jpg', 'logo', array('class' => 'author_pic')) }}
	<div class="auth_desc">
	<h4>You!</h4>
	Email us at milkbagsports@hotmail.com if you're interested in joining the milkbag team!
	</div>
</div>


@endsection