<nav class="navbar">
	<div class="container-fluid">
		<div class="navbar-header">
			<img  class="pull-left" src="{{ asset('/images/mc-batticaloa.png') }}" height="46">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><i class="fa fa-bars" aria-hidden="true"></i></button>
			<h2 class="navbar-brand" href="#">{{ config('app.name', 'Complaints.lk') }}</h2>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><div style="margin-top: 12px; padding-left: 10px" id="google_translate_element"></div></li>
				@if (Auth::guest())
					<li><a href="{{ url('/') }}">Home</a></li>
				@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" style="color: #545151;" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ Auth::user()->name() }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{URL::route('home')}}">Dashboard</a></li>
							<li><a href="{{ URL::route('auth.sign-out-get') }}">Logout</a></li>
						</ul>
					</li>
				@endif
			</ul>
		</div>
	</div>
</nav>
<style type="text/css">
	.goog-te-gadget-simple {
		border-left: 0px solid #ffffff;
	    border-top: 0px solid #ffffff;
	    border-bottom: 0px solid #ffffff;
	    border-right: 0px solid #ffffff;
	}
	.goog-te-menu-value {
		text-decoration: none;
	}
</style>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ta,si,en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>