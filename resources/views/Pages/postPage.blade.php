@extends('Layouts.main')

@section('content')

@section('title', ' | Post')

		<h2 class="thosm_no_align">{{ $post->title }}</h2>

		<p class="thosm_no_align"> <strong>{{ $post->author }} | {{ date('M j, Y g:i A', strtotime($post->updated_at)) }}</strong></p>

		<?php
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"
		?>

	<div class="ssk-group">
	    <a href="http://www.facebook.com/sharer.php?s=100&p[title]={{$post->title}}&p[url]={{$actual_link}}&p[summary]=Check out this post from Milkbag Sports!" class="ssk ssk-facebook"></a>
	    <a href="https://twitter.com/intent/tweet?text=Check Out this post from Milkbag Sports! {{$actual_link}}" class="ssk ssk-twitter"></a>
	    <a href="mailto:?subject=Check out this post by Milkbag Sports!&amp;body=Check it out here: {{$actual_link}}" title="Share by Email" class="ssk ssk-email"></a>
	</div>


		<hr>

		{!! $post->body !!}
		<p class=thosm_no_align> Tags: {{ implode(", ", $post->tags) }}</p>
		<br>

		<hr style="height:10px; border:none; color:#404040; background-color:#404040;" />

		<h3> Comment Section </h3>

		<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = window.location.href;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = {{ $post->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = '//milkbagsports.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

@endsection