@extends('templates.restricted')

@section('content')
	
	<div class="col-md-2 col-sm-3 sidebar_menu">
		@include('includes.sidebar_menu')
	</div>
	<div class="col-md-10 col-sm-9 main_content">
		@yield('restricted_third_level_content')
	</div>

	
@endsection