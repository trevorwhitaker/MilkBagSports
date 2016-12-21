@extends('Layouts.main')

@section('title', ' | MilkBag Sports')

@section('stylesheets')

	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code,media',
			menubar: true
		});
	</script>

@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
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