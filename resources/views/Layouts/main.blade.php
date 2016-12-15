<!DOCTYPE html>
<html>
	<head>
		@include('Partials._head')
	</head>

	<body style="padding-top: 70px;">

	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
			@include('Partials._nav')


			@include('partials._messages')


			@yield('content')

			<hr>

			<p class="text-center">Copyright Milkbag Sports - All rights Reserved</p>

			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
			</div>
			<div class="col-md-offset-1">
			</div>
		</div>
	</div>

		@yield('scripts')
	</body>
</html>