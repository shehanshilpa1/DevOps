@extends('templates.public_base')

@section('title', Config::get('app.name'))

@section('content')
	<div class="home_content_wrapper">
		<div id="myCarousel" class="carousel slide home_carousel" data-ride="carousel">
		    <ol class="carousel-indicators">
		      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      <li data-target="#myCarousel" data-slide-to="1"></li>
		      <li data-target="#myCarousel" data-slide-to="2"></li>
		    </ol>
		    <div class="carousel-inner">
		      <div class="item active">
		        <img src="{{asset('images/news/1582700449.png')}}" alt="Los Angeles" style="width:100%;">
		        <div class="carousel-caption">
		          <h3>Lorem Ipsum is simply dummy text.</h3>
		          <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
		        </div>
		      </div>
		      <div class="item">
		        <img src="{{asset('images/news/1582700449.png')}}" alt="Chicago" style="width:100%;">
		        <div class="carousel-caption">
		          <h3>Lorem Ipsum is simply dummy text.</h3>
		          <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		        </div>
		      </div>
		      <div class="item">
		        <img src="{{asset('images/news/1582700449.png')}}" alt="New York" style="width:100%;">
		        <div class="carousel-caption">
		          <h3>Lorem Ipsum is simply dummy text.</h3>
		          <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
		        </div>
		      </div>
		    </div>
		    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right"></span>
		      <span class="sr-only">Next</span>
		    </a>
		</div>
	</div>
	<div class="news_content_box_home">
		<div class="container">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				@foreach($newses as $key => $news)
	            <div class="col-lg-12">
	                <div class="property-item">
	                    <div class="pi-image">
	                        <img src="{{asset($news->path==''?'images/amcor_lg.jpg':$news->path)}}" alt="{{$news->title}}">
	                        @if($news->created_at!='' && DateTimeUtility::datePassed($news->created_at, '- 3 days'))
	                        <div class="pi-badge new">New</div>
	                        @endif
	                        <i class="fa fa-thumbs-up text-success"></i>
	                        {{-- <i class="fa fa-thumbs-down text-warning"></i> --}}
	                    </div>
	                    <div class="property-details-container">
	                        <p class="property-title">{{(strlen($news->title)>34?substr($news->title, 0, 60).'...' :$news->title)}}</p>
	                        <p class="property-description">{{(strlen($news->description)>135?substr($news->description, 0, 135).'...' :$news->description)}}</p>
	                        <div class="bottom-fixed">
	                        	<p class="posted">Posted: {{DateTimeUtility::getDateTimeDiffHistoryToUserTimeZone($news->created_at).' ago'}}</p>
	                        	<a href="{{URL::route('news-single', $news->slug)}}" class="btn btn-primary checkOutBtn">Read more</a>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            @endforeach
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="category-box-wrapper">
					<div class="cat-box">
						<h2>Government News</h2>
						<div class="cat-news-box">
							<a href="">
								<div class="cat-news-img"><img src="{{asset('images/news/1582700449.png')}}" alt="New York"></div>
								<div class="cat-news-name">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
								</div>
							</a>
						</div>
						<div class="cat-news-box">
							<a href="">
								<div class="cat-news-img"><img src="{{asset('images/news/1582700449.png')}}" alt="New York"></div>
								<div class="cat-news-name">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
								</div>
							</a>
						</div>
						<div class="cat-news-box">
							<a href="">
								<div class="cat-news-img"><img src="{{asset('images/news/1582700449.png')}}" alt="New York"></div>
								<div class="cat-news-name">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
								</div>
							</a>
						</div>
						<a href="{{URL::route('category-name')}}" class="read-more">Read more</a>
					</div>
					<div class="cat-box">
						<h2>Environment News</h2>
						<div class="cat-news-box">
							<a href="">
								<div class="cat-news-img"><img src="{{asset('images/news/1582700449.png')}}" alt="New York"></div>
								<div class="cat-news-name">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
								</div>
							</a>
						</div>
						<div class="cat-news-box">
							<a href="">
								<div class="cat-news-img"><img src="{{asset('images/news/1582700449.png')}}" alt="New York"></div>
								<div class="cat-news-name">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
								</div>
							</a>
						</div>
						<div class="cat-news-box">
							<a href="">
								<div class="cat-news-img"><img src="{{asset('images/news/1582700449.png')}}" alt="New York"></div>
								<div class="cat-news-name">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
								</div>
							</a>
						</div>
						<a href="" class="read-more">Read more</a>
					</div>
					<div class="cat-box">
						<h2>President News</h2>
						<div class="cat-news-box">
							<a href="">
								<div class="cat-news-img"><img src="{{asset('images/news/1582700449.png')}}" alt="New York"></div>
								<div class="cat-news-name">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
								</div>
							</a>
						</div>
						<div class="cat-news-box">
							<a href="">
								<div class="cat-news-img"><img src="{{asset('images/news/1582700449.png')}}" alt="New York"></div>
								<div class="cat-news-name">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
								</div>
							</a>
						</div>
						<div class="cat-news-box">
							<a href="">
								<div class="cat-news-img"><img src="{{asset('images/news/1582700449.png')}}" alt="New York"></div>
								<div class="cat-news-name">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
								</div>
							</a>
						</div>
						<a href="" class="read-more">Read more</a>
					</div>
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
