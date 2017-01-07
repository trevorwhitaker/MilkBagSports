@extends('Layouts.main')

@section('content')

@section('title', ' | Post')

<a href="{{ route('admin.addAuthor') }}" class="btn btn-info" style="margin-top: 15px;"">Add Author</a>

<table class="table table-hover" style="margin-top: 2%">
  <thead>
    <tr>
      <th>First</th>
      <th>Last</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($users as $user)
    <tr>
      <td>{{ $user->first_name}}</td>
      <td>{{ $user->last_name}}</td>
      <td><a href="{{ route('admin.editAuthor', $user->id) }}" class="btn btn-warning" style="margin-top: 15px;">Edit/Delete</a></td>
    </tr>
   @endforeach
  </tbody>
</table>

@endsection