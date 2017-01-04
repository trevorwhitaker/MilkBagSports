@extends('Layouts.main')

@section('content')

@section('title', ' | Post')

<table class="table table-hover">
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
      <td><a href="/posts/{{ $post->title }}">{{ $post->title }}</a></td>
      <td>{{ $post->author}}</td>
      <td>{{ $post->view_count}}</td>
    </tr>
   @endforeach
  </tbody>
</table>

@endsection