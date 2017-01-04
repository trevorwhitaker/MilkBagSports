@if (Session::has('success'))

<div class="alert alert-success" role="alert" style="text-align:  center">
	<strong>Success:</strong> {{ Session::get('success') }}
</div>

@endif

@if (Session::has('error'))

<div class="alert alert-danger" role="alert" style="text-align:  center">
	<strong>Error:</strong> {{ Session::get('error') }}
</div>

@if (count($errors) > 0)

<div class="alert alert-danger" role="alert" style="text-align:  center">
	<strong>Errors:</strong>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>

@endif
@endif