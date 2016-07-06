@extends('Layouts.main')

@section('title', ' | Add A League')

@section('content')

<div class="row">
	<div class="col-md-2 col-md-offset-5">
		{!! Form::open(array('route' => 'posts.store')) !!}
			{{ Form::label('title', 'Title', array('class' => 'addLeagueText')) }}
			{{ Form::text('title', null, array('class' => 'form-control')) }}

			{{ Form::label('author', 'Author', array('class' => 'addLeagueText')) }}
			{{ Form::text('author', null, array('class' => 'form-control')) }}

			{{ Form::label('body', 'Body', array('class' => 'addLeagueText')) }}
			{{ Form::textarea('body', null, array('class' => 'form-control')) }}

			{{ Form::submit('Submit', array('class' => 'btn btn-primary center-block')) }}

		{!! Form::close() !!}
	</div>
</div>

@endsection