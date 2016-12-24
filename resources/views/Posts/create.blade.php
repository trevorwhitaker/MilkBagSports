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
			{!! Form::open(array('route' => 'posts.store', 'files' => true)) !!}
				{{ Form::label('title', 'Title') }}
				{{ Form::text('title', null, array('class' => 'form-control')) }}
				<br>

				{{ Form::label('author', 'Author') }}
				{{ Form::select('author', ['Scoop' => 'Scoop', 'The Vet' => 'The Vet']) }}
				<br>

				
				{{ Form::label('post_image', 'Add Title Image') }}
				{{ Form::file('post_image') }}


				{{ Form::label('body', 'Body') }}
				{{ Form::textarea('body', null, array('class' => 'form-control')) }}
				<br>
				{!! Form::label('tags[]', 'Tags', ['class' => 'col-lg-2 control-label'] )  !!}
                {!! Form::select('tags[]',
                [
                'Baseball' => 'Baseball',
                'Hockey' => 'Hockey',
                'Tennis' => 'Tennis',
                'Basketball' => 'Basketball',
                'Other' => 'Other'
                ],
                $selected = null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}

				{{ Form::submit('Submit', array('class' => 'btn btn-primary center-block')) }}

			{!! Form::close() !!}
	</div>
</div>

@endsection