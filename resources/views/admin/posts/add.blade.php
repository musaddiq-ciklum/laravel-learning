@extends('admin/layouts.app')

@section('page_heading',$page_heading)
@section('page_sub_heading',$page_sub_heading)

@section('action_links')
    @isset($main_page)
    <a href="{{ $main_page }}" class="btn-shadow  btn btn-danger">< &nbsp;Back</a>
    @endisset
@stop

@section('content')
    <div class="row">
        <form method="post" action="{{route('posts.store')}}" class="" style="width: 100%" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="0">
            <div class="col-md-6">
                <!-- general form elements -->
                <!-- /.card -->
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Description</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="cost_price" class="">Title</label>
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input name="title" id="title" placeholder="Title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" >
                        </div>

                        <div class="form-group">
                            <label for="long_desc" class="">Contents</label>
                            @error('contents')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <textarea name="contents" id="contents" class="form-control @error('contents') is-invalid @enderror" placeholder="Contents">{{ old('contents') }}</textarea>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

