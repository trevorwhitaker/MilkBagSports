<div class="row">
	<div class="col-md-2">
		{!! Form::open(array('route' => 'posts.saveComment')) !!}
			{{ Form::label('name', 'Name', array('class' => 'addLeagueText')) }}
			{{ Form::text('name', null, array('class' => 'form-control')) }}

			{{ Form::label('text', 'Comment', array('class' => 'addLeagueText')) }}
			{{ Form::textarea('text', null, array('class' => 'form-control')) }}

			{{ Form::hidden('post_id', $post->id) }}
			{{ Form::hidden('reply_id', $comment->id) }}

			{{ Form::submit('Submit', array('class' => 'btn btn-primary center-block')) }}

		{!! Form::close() !!}
	</div>
</div>