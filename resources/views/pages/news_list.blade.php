@extends('templates.restricted_third_level')

@section('title', 'News list')

@section('restricted_third_level_content')
    <div class="row">
        <div class="col-md-12 table-responsive">
            <h4>News list</h4>
            <hr>
            @if(Session::has('message'))
            <div class="alert alert-{{ Session::get('type') }} alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p style="text-align: center;">{{ Session::get('message') }}</p>
            </div>
            @endif
            <div class="row" style="padding-bottom: 10px;">
                <div class="col-md-offset-6 col-md-6">
                    <a href="{{URL::route('get-create-news-page')}}" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add News</a>
                </div>
            </div>
            <table class="table table-bordered">
                <tr class="text-center">
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @if(count($newses)>0)
                @foreach($newses as $key => $news)
                <tr>
                    <td>{{  $key+1}}</td>
                    <td>{!! $news->title   !!}</td>
                    <td>{{  $news->description   }}</td>
                    <td>{{  $news->status==1?'Active':'Inactive'   }}</td>
                    <td>
                        <a href="{{URL::route('get-update-news-page', $news->id)}}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5">No news available</td>
                </tr>
                @endif
            </table>
        </div>
    </div>
    {{ $newses->render() }}
@endsection