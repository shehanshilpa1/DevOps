@extends('templates.base')

@section('sub_template')
	<!-- Place navbar here -->
	@include('includes.header')
	
	<div class="container-fluid">
		<div class="row wrapper">
			@yield('content')
		</div>
	</div>
	@include('includes.footer')
@endsection