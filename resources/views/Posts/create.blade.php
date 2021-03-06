@extends('Layouts.main')

@section('title', ' | MilkBag Sports')

@section('stylesheets')

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
	tinymce.init({

		selector: "textarea",
		height: "650",      
		plugins: "link code, media, paste, image",
		valid_elements: "*[*]",
		extended_valid_elements: "embed[width|height|name|flashvars|src|bgcolor|align|play|loop|quality|allowscriptaccess|type|pluginspage],object[id|style|width|height|classid|codebase|*],param[name|value],embed[id|style|width|height|type|src|*]",
		menubar: true,
		images_upload_url: 'postAcceptor.php',
  automatic_uploads: false,
		paste_data_images: true,
		paste_enable_default_filters: false
	});
</script>

@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<h2> New Blog: </h2>
		<hr>
		<div style="color: red">Please don't have the character "/" in the Title!</div>
		{!! Form::open(array('route' => 'posts.store', 'files' => true)) !!}
		{{ Form::label('title', 'Title') }}
		{{ Form::text('title', null, array('class' => 'form-control')) }}
		<br>

		{{ Form::label('post_image', 'Add Title Image') }}
		{{ Form::file('post_image') }}


		{{ Form::label('body', 'Body') }}
		{{ Form::textarea('body', null, array('class' => 'form-control')) }}
		<br>

		<span class="button-checkbox">
			<button type="button" class="btn" data-color="primary">Baseball</button>
			<input type="checkbox" name="tags[]" class="hidden" value="Baseball" />
		</span>
		<span class="button-checkbox">
			<button type="button" class="btn" data-color="primary">Basketball</button>
			<input type="checkbox" name="tags[]" class="hidden" value="Basketball" />
		</span>
		<span class="button-checkbox">
			<button type="button" class="btn" data-color="primary">Football</button>
			<input type="checkbox" name="tags[]" class="hidden" value="Football" />
		</span>
		<span class="button-checkbox">
			<button type="button" class="btn" data-color="primary">Hockey</button>
			<input type="checkbox" name="tags[]" class="hidden" value="Hockey" />
		</span>
		<span class="button-checkbox">
			<button type="button" class="btn" data-color="primary">Viral</button>
			<input type="checkbox" name="tags[]" class="hidden" value="Viral" />
		</span>
		<span class="button-checkbox">
			<button type="button" class="btn" data-color="primary">Other</button>
			<input type="checkbox" name="tags[]" class="hidden" value="Other" />
		</span>

		<br>
		<br>

		{{ Form::submit('Submit', array('class' => 'btn btn-primary center-block')) }}

		{!! Form::close() !!}
	</div>
</div>

@endsection

@section('scripts')
<script src="/js/tagsChecklist.js"></script>
@endsection