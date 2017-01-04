@extends('Layouts.main')

@section('content')

@section('title', ' | Post')

<div class="col-md-4 col-md-offset-4" style="text-align: center;">
<br>
	{!! Form::open(array('route' => 'auth.changePassword')) !!}
		{{ Form::label('newPass', 'New Password') }}
		{{ Form::password('newPass', array('class' => 'form-control')) }}
		<br>

		{{ Form::label('confPass', 'Re-enter Password') }}
		{{ Form::password('confPass', array('class' => 'form-control')) }}
		<br>

		{{ Form::submit('Submit', array('class' => 'btn btn-primary center-block')) }}

		{!! Form::close() !!}

</div>

@endsection