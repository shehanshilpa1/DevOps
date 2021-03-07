@if(Session::has('message'))
	<div class="alert alert-{{ Session::get('type') }} alert-dismissible" role="alert">
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	    <p style="text-align: center;">{{ Session::get('message') }}</p>
	</div>
@endif