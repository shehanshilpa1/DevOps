@extends('templates.restricted_third_level')

@section('title', 'Update user')

@section('restricted_third_level_content')
	<div class="row">
		<div class="col-md-12">
			<h4>Update user</h4>
			<hr>
			@if(Session::has('message'))
			<div class="alert alert-{{ Session::get('type') }} alert-dismissible" role="alert">
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<p style="text-align: center;">{{ Session::get('message') }}</p>
			</div>
			@endif
			{!!	Form::open(['route' => 'user.user-update-post', 'class'=>'form-horizontal', 'id'=>'update_user', 'files' => true])	!!}
				<input type="hidden" name="id" value="{{$user->id}}">
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
				    <label for="" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-10">
				      	<input type="email" class="form-control" name="email" id="email" value="{{old('email')==''?$user->email:old('email')}}" placeholder="Enter the email address">
				      	@if($errors->has('email')) 
                            <p class="help-block">{{ $errors->first('email') }}</p>
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
                    <label class="col-sm-2 control-label">Role</label>
                    <div class="col-sm-4">
                    {!! Form::select('role',['' => 'Select...'] + CommonHelper::getRoles(),(old('role')==''?$user->roles()->get()->pluck('id'):old('role')),array('class'=>'form-control')) !!}
                        @if($errors->has('role')) 
                            <p class="help-block">{{ $errors->first('role') }}</p>
                        @endif
                    </div>
                </div>
				<div class="form-group">
				    <label for="" class="col-sm-2 control-label">Status</label>
				    <div class="col-sm-4">
				    	{!! Form::select('status',['active' => 'Active', 'inactive' => 'Inactive', 'pending' => 'Pending'], (old('status')==''?$user->status:old('status')),array('class'=>'form-control', 'id' => 'status')) !!}
				      	@if($errors->has('status')) 
                            <p class="help-block">{{ $errors->first('status') }}</p>
                		@endif
				    </div>
				</div>


				<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">Update user</button>
				    </div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('additional-scripts')
	<script type="text/javascript">
		
	</script>
@endsection