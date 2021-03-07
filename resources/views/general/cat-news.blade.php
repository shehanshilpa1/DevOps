@extends('templates.public_base')

@section('title', Config::get('app.name'))

@section('content')
<div class="home_content_wrapper inner_page_wrapper">
    <div class="container">
        <h1>Environment News</h1>
        <p class="main_dise">Lorem Ipsum is simply dummied text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
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
                                    <div class="cat-news-img"><img src="{{asset('images/image3.jpg')}}" alt="New York"></div>
                                    <div class="cat-news-name">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                                    </div>
                                </a>
                            </div>
                            <div class="cat-news-box">
                                <a href="">
                                    <div class="cat-news-img"><img src="{{asset('images/image3.jpg')}}" alt="New York"></div>
                                    <div class="cat-news-name">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                                    </div>
                                </a>
                            </div>
                            <div class="cat-news-box">
                                <a href="">
                                    <div class="cat-news-img"><img src="{{asset('images/image3.jpg')}}" alt="New York"></div>
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
                                    <div class="cat-news-img"><img src="{{asset('images/image3.jpg')}}" alt="New York"></div>
                                    <div class="cat-news-name">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                                    </div>
                                </a>
                            </div>
                            <div class="cat-news-box">
                                <a href="">
                                    <div class="cat-news-img"><img src="{{asset('images/image3.jpg')}}" alt="New York"></div>
                                    <div class="cat-news-name">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                                    </div>
                                </a>
                            </div>
                            <div class="cat-news-box">
                                <a href="">
                                    <div class="cat-news-img"><img src="{{asset('images/image3.jpg')}}" alt="New York"></div>
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
                                    <div class="cat-news-img"><img src="{{asset('images/image3.jpg')}}" alt="New York"></div>
                                    <div class="cat-news-name">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                                    </div>
                                </a>
                            </div>
                            <div class="cat-news-box">
                                <a href="">
                                    <div class="cat-news-img"><img src="{{asset('images/image3.jpg')}}" alt="New York"></div>
                                    <div class="cat-news-name">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                                    </div>
                                </a>
                            </div>
                            <div class="cat-news-box">
                                <a href="">
                                    <div class="cat-news-img"><img src="{{asset('images/image3.jpg')}}" alt="New York"></div>
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
    </div>
</div>
@endsection
@section('additional-scripts')
@endsection
@section('additional-css')
<style type="text/css">
    
</style>
@endsection
