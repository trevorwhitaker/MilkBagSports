@extends('Layouts.main')

@section('content')

@section('title', ' | Post')

<meta http-equiv="refresh" content="5;url=/" />

<p class="thosm_no_align" style="text-align: center; font-size: 35px; margin-top: 20px"> Looks like you're lost. Dont worry, we'll put you back on track. </p>

{{ Html::image('images/error.png', 'error', array('class' => 'error-image')) }}

@endsection