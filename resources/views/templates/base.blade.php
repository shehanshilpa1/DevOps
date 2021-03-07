<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="/images/favicon.png" type="image/x-icon"/>

	<title>@yield('title')</title>

	<!-- Styles -->
	<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
	@yield('additional-css')

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link href="{{ asset('/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<script src="https://use.fontawesome.com/2c12051723.js"></script>

	<script src="{{ asset('/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/sb-admin-2.js') }}"></script>
	<script src="{{ asset('/js/metisMenu.min.js') }}"></script>

	@yield('third-party-includes')
</head>
<body>
	@yield('sub_template')

	<!-- Scripts -->
	<script src="{{ asset('/js/custom.js') }}"></script>
	@yield('additional-scripts')
</body>
</html>
