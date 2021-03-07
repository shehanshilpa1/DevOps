@extends('templates.restricted_third_level')

@section('title', 'Update news')

@section('restricted_third_level_content')
    <div class="row">
        <div class="col-md-12">
            <h4>Update news</h4>
            <hr>
            @if(Session::has('message'))
            <div class="alert alert-{{ Session::get('type') }} alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p style="text-align: center;">{{ Session::get('message') }}</p>
            </div>
            @endif
            {!! Form::open(['route' => 'update-news', 'class'=>'form-horizontal', 'id'=>'create_blog', 'files' => true])  !!}
            <input type="hidden" name="id" value="{{$news->id}}">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Title <span style="color: #FF0000">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="title" value="{{old('title')==''?$news->title:old('title')}}" placeholder="Enter the title">
                        @if($errors->has('title')) 
                            <p class="help-block">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Description <span style="color: #FF0000">*</span></label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" style="height: 50px;" name="description">{{old('description')==''?$news->description:old('description')}}</textarea>
                        @if($errors->has('description')) 
                            <p class="help-block">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Content</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="content" style="height: 500px;" name="content">{{old('content')==''?$news->content:old('content')}}</textarea>
                        @if($errors->has('content')) 
                            <p class="help-block">{{ $errors->first('content') }}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Thumbnail</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="thumbnail" id="thumbnail" accept="image/*">
                        @if($errors->has('thumbnail')) 
                            <p class="help-block">{{ $errors->first('thumbnail') }}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-4">
                        {!! Form::select('status',['1' => 'Active', '0' => 'Inactive'],(old('active')==''?$news->status:old('active')),array('class'=>'form-control', 'id' => 'status')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Update news</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('additional-scripts')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{ route('upload-image-for-ckeditor',['_token' => csrf_token() ]) }}",
        height:800,
    });
</script>
@endsection