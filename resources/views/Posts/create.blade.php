@extends('Layouts.main')

@section('title', ' | MilkBag Sports')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h2> New Blog: </h2>
		<hr>
			{!! Form::open(array('route' => 'posts.store')) !!}
				{{ Form::label('title', 'Title', array('class' => 'addLeagueText')) }}
				{{ Form::text('title', null, array('class' => 'form-control')) }}
				<br>


				{{ Form::label('author', 'Author', array('class' => 'addLeagueText')) }}
				{{ Form::select('author', ['Scoop' => 'Scoop', 'The Vet' => 'The Vet']) }}
				<br>

				{{ Form::label('body', 'Body', array('class' => 'addLeagueText')) }}
				{{ Form::textarea('body', null, array('class' => 'form-control')) }}

				{{ Form::submit('Submit', array('class' => 'btn btn-primary center-block')) }}

			{!! Form::close() !!}
	</div>
</div>

@endsection