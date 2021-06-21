@extends('admin/layouts.app')

@section('page_heading',$page_heading)
@section('page_sub_heading',$page_sub_heading)

@section('action_links')
    @isset($back_link)
    <a href="{{ $back_link }}" class="btn-shadow  btn btn-danger">< &nbsp;Back</a>
    @endisset
@stop

@section('content')
    <div class="row">
        <form method="post" action="{{route('pages.store')}}" class="" style="width: 100%" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="0">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General Info</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name" class="">Name</label>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input name="name" id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" >
                            </div>
                            <div class="form-group">
                                <label for="long_desc" class="">Description</label>
                                @error('desc')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <textarea name="desc" id="desc" class="form-control summernote @error('desc') is-invalid @enderror" placeholder="Description">{{ old('desc') }}</textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                </div>
            <!-- /.card -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">SEO</h3>
                    </div>
                    <div class="card-body">
                        <div class="position-relative form-group">
                            <label for="title" class="">Title</label>
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title') }}">
                        </div>

                        <div class="position-relative form-group">
                            <label for="long_desc" class="">Meta Description</label>
                            @error('meta_desc')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <textarea name="meta_desc" id="meta_desc" class="form-control @error('meta_desc') is-invalid @enderror" placeholder="Description">{{ old('meta_desc') }}</textarea>
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

