@extends('Layouts.main')

@section('title', ' | MilkBag Sports')

@section('stylesheets')

	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<script>
		tinymce.init({

		selector: "textarea",      
		plugins: "link code, media",
		valid_elements: "*[*]",
		extended_valid_elements: "embed[width|height|name|flashvars|src|bgcolor|align|play|loop|quality|allowscriptaccess|type|pluginspage],object[id|style|width|height|classid|codebase|*],param[name|value],embed[id|style|width|height|type|src|*]",
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

				<span class="button-checkbox">
					<button type="button" class="btn" data-color="primary">Baseball</button>
					<input type="checkbox" name="tags[]" class="hidden" value="Baseball" {{ in_array('Baseball', $post->tags)  ? 'checked' : 'unchecked' }} />
				</span>
				<span class="button-checkbox">
					<button type="button" class="btn" data-color="primary">Basketball</button>
					<input type="checkbox" name="tags[]" class="hidden" value="Basktball" {{ in_array('Basketball', $post->tags)  ? 'checked' : 'unchecked' }}/>
				</span>
				<span class="button-checkbox">
					<button type="button" class="btn" data-color="primary">Football</button>
					<input type="checkbox" name="tags[]" class="hidden" value="Football" {{ in_array('Football', $post->tags)  ? 'checked' : 'unchecked' }}/>
				</span>
				<span class="button-checkbox">
					<button type="button" class="btn" data-color="primary">Hockey</button>
					<input type="checkbox" name="tags[]" class="hidden" value="Hockey" {{ in_array('Hockey', $post->tags)  ? 'checked' : 'unchecked' }}/>
				</span>
				<span class="button-checkbox">
					<button type="button" class="btn" data-color="primary">Viral</button>
					<input type="checkbox" name="tags[]" class="hidden" value="Viral" {{ in_array('Viral', $post->tags)  ? 'checked' : 'unchecked' }}/>
				</span>
				<span class="button-checkbox">
					<button type="button" class="btn" data-color="primary">Other</button>
					<input type="checkbox" name="tags[]" class="hidden" value="Other" {{ in_array('Other', $post->tags)  ? 'checked' : 'unchecked' }}/>
				</span>

				<br>
				<br>
                
				{{ Form::submit('Submit', array('class' => 'btn btn-primary center-block')) }}
			{!! Form::close() !!}
	</div>
</div>
<br>
<hr>
@foreach($comments as $comment)

<div>
	<p>{{ $comment->name }}: </p>
	<p>{{ $comment->text }} </p>
</div>
		{!! Form::open(['route' => ['posts.deleteComment', $comment->id], 'method' => 'DELETE']) !!}
		{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
<div class="collapse" id="collapseComment{{$comment->id}}">
	<div class="card card-block">
		@include('Partials._replyComment')
	</div>
</div>
<hr>
@endforeach

@endsection

@section('scripts')
<script src="/js/tagsChecklist.js"></script>
@endsection