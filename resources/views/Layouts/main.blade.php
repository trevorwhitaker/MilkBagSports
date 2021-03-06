<!DOCTYPE html>
<html>
	<head>
		@include('Partials._head')
	</head>
	<body class="body-class">
	@include('Partials._nav')

	<div class="container main">
		<div class="row">
			<div class="col-md-1">
			</div>


			<div class="col-md-10">
			

			@include('Partials._messages')


			@yield('content')


			</div>

			<div class="col-md-1">
			</div>


			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
						
			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

			<!-- Need to put this in a footer file -->
			<!-- <p class="text-center">Copyright MilkBag Sports - All rights Reserved</p> -->
			@yield('scripts')
		</div>
	</div>
	@include('Partials._footer')
	</body>
</html>