@extends('templates.restricted_third_level')

@section('title', 'User profile')

@section('restricted_third_level_content')
	<div class="row">
		<div class="col-md-12">
			<h4>User profile</h4>
			<hr>
			@if(Session::has('message'))
			<div class="alert alert-{{ Session::get('type') }} alert-dismissible" role="alert">
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<p style="text-align: center;">{{ Session::get('message') }}</p>
			</div>
			@endif
			{!!	Form::open(['route' => 'update-user-profile', 'class'=>'form-horizontal', 'id'=>'update_user', 'files' => true])	!!}
				<input type="hidden" name="id" value="{{$user->id}}">
				<div class="row col-sm-offset-2" style="margin-bottom: 20px;">
					<img width="150px" height="150px" class="img-circle" src="{{$user->avatar==''?asset('images/user.png'):asset($user->avatar)}}">
				</div>
				<div class="form-group">
				    <label for="" class="col-sm-2 control-label">First name</label>
				    <div class="col-sm-10">
				      	<input type="text" class="form-control" name="first_name" id="first_name" value="{{old('first_name')==''?$user->first_name:old('first_name')}}" placeholder="Enter the first name">
				      	@if($errors->has('first_name')) 
                            <p class="help-block">{{ $errors->first('first_name') }}</p>
                		@endif
				    </div>
				</div>
				<div class="form-group">
				    <label for="" class="col-sm-2 control-label">Last name</label>
				    <div class="col-sm-10">
				      	<input type="text" class="form-control" name="last_name" id="last_name" value="{{old('last_name')==''?$user->last_name:old('last_name')}}" placeholder="Enter the last name">
				      	@if($errors->has('last_name')) 
                            <p class="help-block">{{ $errors->first('last_name') }}</p>
                		@endif
				    </div>
				</div>
				<div class="form-group">
				    <label for="" class="col-sm-2 control-label">Home phone number</label>
				    <div class="col-sm-10">
				      	<input type="text" class="form-control" name="home_phone" id="home_phone" value="{{old('home_phone')==''?$user->home_phone_no:old('home_phone')}}" placeholder="Enter home phone number (Ex: 0112123123)">
				      	@if($errors->has('home_phone')) 
                            <p class="help-block">{{ $errors->first('home_phone') }}</p>
                		@endif
				    </div>
				</div>
				<div class="form-group">
				    <label for="" class="col-sm-2 control-label">Mobile number</label>
				    <div class="col-sm-10">
				      	<input type="text" class="form-control" name="mobile_no" id="mobile_no" value="{{old('mobile_no')==''?$user->mobile_no:old('mobile_no')}}" placeholder="Enter mobile number (Ex: 0712345678)">
				      	@if($errors->has('mobile_no')) 
                            <p class="help-block">{{ $errors->first('mobile_no') }}</p>
                		@endif
				    </div>
				</div>
				<div class="form-group">
				    <label for="" class="col-sm-2 control-label">Address</label>
				    <div class="col-sm-10">
				      	<input type="text" class="form-control" name="address" id="address" value="{{old('address')==''?$user->address:old('address')}}" placeholder="Enter the address">
				      	@if($errors->has('address')) 
                            <p class="help-block">{{ $errors->first('address') }}</p>
                		@endif
				    </div>
				</div>
				<div class="form-group">
                    <label for="" class="col-sm-2 control-label">Profile picture</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="avatar" id="avatar" multiple="">
                    </div>
                </div>
                <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-primary">Update profile</button>
				    </div>
				</div>
			{!! Form::close() !!}
		</div>
		<hr>
		<div class="col-md-12" style="margin-top: 50px; border: 1px solid #ccc;">
			{!!	Form::open(['route' => 'reset-password', 'class'=>'form-horizontal'])	!!}

				<div class="form-group" style="padding-top: 20px;">
				    <label for="" class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-10">
				      	<input type="password" class="form-control" name="password" id="password" placeholder="Enter the new password">
				    </div>
				</div>
				<div class="form-group">
				    <label for="" class="col-sm-2 control-label">Confirm password</label>
				    <div class="col-sm-10">
				      	<input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Re enter the new password">
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" id="pwdSbt" class="btn btn-default" disabled="">Update password</button>
				    </div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('additional-scripts')
	<script type="text/javascript">
		$('#password').on('keyup', function () {
			if ($('#password').val()=='') {
				$('#pwdSbt').prop('disabled', true);
			}
		});

		$('#confirm_password').on('keyup', function () {
			if ($('#confirm_password').val()!='' && ($('#confirm_password').val()==$('#password').val())) {
				$('#pwdSbt').prop('disabled', false);
			} else {
				$('#pwdSbt').prop('disabled', true);
			}
		});
	</script>
@endsection