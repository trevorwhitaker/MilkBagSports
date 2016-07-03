<!DOCTYPE html>
<html>
	<head>
		@include('Partials._head')
	</head>

	<body>
		@include('Partials._nav')


		@include('partials._messages')


		@yield('content')

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		@yield('scripts')
	</body>
</html>