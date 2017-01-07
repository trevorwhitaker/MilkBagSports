@extends('Layouts.main')

@section('content')

@section('title', ' | Post')

<a href="{{ route('admin.getAuthors') }}" class="btn btn-info" style="margin-top: 15px;">Manage Authors</a>

<table class="table table-hover" style="margin-top: 2%">
  <thead>
    <tr>
      <th>Title</th>
      <th>Author</th>
      <th>Views</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($posts as $post)
    <tr>
      <td><a href="/posts/{{ rawurlencode($post->title) }}">{{ $post->title }}</a></td>
      <td>{{ $post->author}}</td>
      <td>{{ $post->view_count}}</td>
    </tr>
   @endforeach
  </tbody>
</table>

@endsection