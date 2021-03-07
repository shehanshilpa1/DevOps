@extends('templates.public_base')

@section('title', Config::get('app.name'))

@section('content')

<div class="news-single-wrapper">
	<div class="banner">
		<img src="{{asset($news->path==''?'images/amcor_lg.jpg':$news->path)}}" alt="{{$news->title}}">
	</div>
	<div class="container">
		<h1>{{$news->title}}</h1>
		<div class="content-wrapper">
			{!!$news->content!!}
		</div>
		<div class="entry-meta-wrap social-icons right">
	        <p class="share_text">Share this on :</p>
	        <div class="fb-share-button" data-href="" data-layout="button_count"></div>
	        <a class="twitter-share-button" target="_blank" href="https://twitter.com/intent/tweet?text=" data-size="large"><i class="fa fa-twitter"></i></a>
	        <a class="provider-link" target="_blank" href="https://wa.me/?phone=&text=&source=&data="><i class="fa fa-whatsapp"></i></a>
	    </div>
		<div class="sources-div">
			<h4>Sources</h4>
			<div class="sources-link">
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book: </p>
				<a href="https://www.cbsl.gov.lk/sites/default/files/cbslweb_documents/publications/annual_report/2018/en/15_S_Appendix.pdf">https://www.cbsl.gov.lk/sites/default/files/cbslweb_documents/publications/annual_report/2018/en/15_S_Appendix.pdf</a>
			</div>
			<div class="sources-link">
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book: </p>
				<a href="https://www.cbsl.gov.lk/sites/default/files/cbslweb_documents/publications/annual_report/2018/en/15_S_Appendix.pdf">https://www.cbsl.gov.lk/sites/default/files/cbslweb_documents/publications/annual_report/2018/en/15_S_Appendix.pdf</a>
			</div>
			<div class="sources-link">
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book: </p>
				<a href="https://www.cbsl.gov.lk/sites/default/files/cbslweb_documents/publications/annual_report/2018/en/15_S_Appendix.pdf">https://www.cbsl.gov.lk/sites/default/files/cbslweb_documents/publications/annual_report/2018/en/15_S_Appendix.pdf</a>
			</div>
		</div>
	</div>
</div>

@endsection
@section('additional-scripts')
@endsection
@section('additional-css')
<style type="text/css">
    
</style>
@endsection
