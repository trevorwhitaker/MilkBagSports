 @extends('Layouts.main')

@section('content')

@section('title', ' | Post')

<br>

		{!! Form::open(array('route' => array('admin.updateAuthor', $user->id))) !!}
			{{ Form::label('first_name', 'First Name') }}
			{{ Form::text('first_name', $user->first_name, array('class' => 'form-control')) }}

			{{ Form::label('last_name', 'Last Name') }}
			{{ Form::text('last_name', $user->last_name, array('class' => 'form-control')) }}

			{{ Form::label('alias', 'Alias') }}
			{{ Form::text('alias', $user->alias, array('class' => 'form-control')) }}

			{{ Form::label('email', 'Username') }}
			{{ Form::text('email', $user->email, array('class' => 'form-control')) }}

			<table>
				<tr>
					<td>
						{{ Form::label('role_author', 'Author') }}
					</td>
					<td>
						&nbsp
						{{ Form::checkbox('role_author', null, $user->hasRole('Author') ? 'checked' : '', array('class' => '')) }}
					</td>
				</tr>
				<br>
				<tr>
					<td>
						{{ Form::label('role_admin', 'Admin') }}
					</td>
					<td>
						&nbsp
						{{ Form::checkbox('role_admin', null, $user->hasRole('Admin') ? 'checked' : '', array('class' => '')) }}
					</td>
				</tr>
			</table>

			<br>

			{{ Form::submit('Submit Change', array('class' => 'btn btn-primary center-block')) }}

		{!! Form::close() !!}

		<div style="margin-top: 200px">
			{!! Form::open(['route' => ['admin.deleteAuthor', $user->id], 'method' => 'DELETE']) !!}
			{!! Form::submit('DELETE AUTHOR', ['class' => 'btn btn-danger center-block']) !!}
			{!! Form::close() !!}
		</div>

@endsection