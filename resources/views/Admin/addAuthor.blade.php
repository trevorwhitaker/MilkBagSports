 @extends('Layouts.main')

@section('content')

@section('title', ' | Post')

<br>

<p> Authors default password will be the first 4 characters of their last name followed by 1234 </p>

		{!! Form::open(array('route' => array('admin.createAuthor'))) !!}
			{{ Form::label('first_name', 'First Name') }}
			{{ Form::text('first_name', null, array('class' => 'form-control')) }}

			{{ Form::label('last_name', 'Last Name') }}
			{{ Form::text('last_name', null, array('class' => 'form-control')) }}

			{{ Form::label('alias', 'Alias') }}
			{{ Form::text('alias', null, array('class' => 'form-control')) }}

			{{ Form::label('email', 'Username') }}
			{{ Form::text('email', null, array('class' => 'form-control')) }}

			<br>

			{{ Form::submit('Submit Change', array('class' => 'btn btn-primary center-block')) }}

		{!! Form::close() !!}

@endsection