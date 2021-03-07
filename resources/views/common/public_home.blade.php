@extends('templates.public')

@section('title', 'CWMIN - Intranet')

@section('content')
	@include('common.public_header')
	<div class="container-fluid">
		<div class="content-main">
			<div class="title">Intranet Portal</div>
			<div class="logo">
			<img  src="{{ asset('/images/welcome_01.png') }}" height="60">
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 col-md-offset-3">
	    		<div class="panel panel-default panel-login">
				  	<div class="panel-heading">
				    	<div class="panel-title text-center">User Login</div>
				 	</div>
				  	<div style="padding-top:30px" class="panel-body">

				  		@if (count($errors) > 0)
		                    <div class="alert alert-danger col-sm-12 text-center">
		                        <strong>Whoops!</strong> There were some problems with your input.<br>
		                        <ul style="list-style:none; padding-left:0px;">
		                            @foreach ($errors->all() as $error)
		                                <li>{{ $error }}</li>
		                            @endforeach
		                        </ul>
		                    </div>
		                @endif
		                @if (session('message'))
		                    @if(session('type') == 'success')
		                    <div class="alert alert-success text-center">
		                        {{ session('message') }}
		                    </div>
		                    @elseif(session('type') == 'danger')
		                    <div class="alert alert-danger text-center">
		                        {{ session('message') }}
		                    </div>
		                    @endif

		                @endif

				    	<form id="loginform" class="form-horizontal" role="form" method="POST" action="{{ URL::route('auth.sign-in-post') }}">
	                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		                    <input type="hidden" name="_timezone" value="" class="time-zone">

				    	  	<div class="form-group">
				    	  		<div class="col-md-8 col-md-offset-2 input-group">
				    	  			<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
				    		    	<input id="login-username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="username">
				    			</div>
				    		</div>
				    		<div class="form-group">
				    			<div class="col-md-8 col-md-offset-2 input-group">
				    				<span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
				    				<input id="login-password" type="password" class="form-control" name="password" placeholder="password">
				    			</div>
				    		</div>
				    		<div class="form-group">
					    		<div class="col-md-8 col-md-offset-2">
						    		<div class="checkbox">
						    	    	<label>
						    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
						    	    	</label>
						    	    </div>
						    	</div>
						    </div>
					    	<div style="margin-top:10px" class="form-group">
		                        <!-- Button -->

		                        <div class="col-md-8 col-md-offset-2 controls">
		                          <button type="submit" class="btn btn-success btn-block full-width"><b><i class="fa fa-sign-in" aria-hidden="true"></i> Login</b></button>
		                        </div>
		                    </div>
				      	</form>
				    </div>
				</div>
			</div>
    	</div>
	</div>
	@include('common.public_footer')
@endsection
