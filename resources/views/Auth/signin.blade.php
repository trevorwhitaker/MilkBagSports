@extends('Layouts.main')

@section('content')

@section('title', ' | Post')

<div class="col-md-4 col-md-offset-4" style="text-align: center;">
<br>
	{!! Form::open(array('route' => 'auth.signin')) !!}
		{{ Form::label('email', 'Username') }}
		{{ Form::text('email', null, array('class' => 'form-control')) }}
		<br>

		{{ Form::label('password', 'Password') }}
		{{ Form::password('password', array('class' => 'form-control')) }}
		<br>

		{{ Form::submit('Submit', array('class' => 'btn btn-primary center-block')) }}

		{!! Form::close() !!}

</div>

@endsection