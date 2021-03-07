@extends('templates.restricted_third_level')

@section('title', 'User list')

@section('restricted_third_level_content')
	<div class="row">
		<div class="col-md-12 table-responsive">
			<h4>User list</h4>
			<hr>
			@if(Session::has('message'))
			<div class="alert alert-{{ Session::get('type') }} alert-dismissible" role="alert">
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<p style="text-align: center;">{{ Session::get('message') }}</p>
			</div>
			@endif
			<div class="row" style="padding-bottom: 10px;">
				<div class="col-md-offset-6 col-md-6">
					<a href="{{URL::route('user.user-create-get')}}" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add user</a>
				</div>
			</div>
			<table class="table table-bordered">
				<tr class="text-center">
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>Home phone number</th>
					<th>Mobile phone number</th>
					<th>Address</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
				@if(count($users)>0)
				@foreach($users as $key => $user)
				<tr>
					<td>{{  $key+1}}</td>
					<td>{{	$user->name()	}}</td>
					<td>{{	$user->email	}}</td>
					<td>{{	$user->home_phone_no	}}</td>
					<td>{{	$user->mobile_no	}}</td>
					<td>{{	$user->address	}}</td>
					<td>{{	$user->status	}}</td>
					<td>
						<a href="{{URL::route('user.user-update-get', $user->id)}}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
					</td>
				</tr>
				@endforeach
				@else
				<tr>
					<td colspan="8">No users available</td>
				</tr>
				@endif
			</table>
		</div>
	</div>
	{{ $users->render() }}
@endsection