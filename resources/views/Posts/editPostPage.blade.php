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
		<h2> Edit Blog: </h2>

		{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
		{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}

		<hr>
			{!! Form::open(array('method' => 'PUT', 'route' => ['posts.update', $post->id])) !!}
				{{ Form::label('title', 'Title') }}
				{{ Form::text('title', $post->title, array('class' => 'form-control')) }}
				<br>

				{{ Form::label('author', 'Author') }}
				{{ Form::select('author', ['Scoop' => 'Scoop', 'The Vet' => 'The Vet'], $post->author) }}
				<br>

				{{ Form::label('body', 'Body') }}
				{{ Form::textarea('body', $post->body, array('class' => 'form-control')) }}
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