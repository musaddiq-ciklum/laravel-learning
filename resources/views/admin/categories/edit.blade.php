@extends('admin/layouts.app')

@section('page_heading',$page_heading)
@section('page_sub_heading',$page_sub_heading)

@section('action_links')
    @isset($back_link)
        <li><a href="{{ $back_link }}" class="btn-shadow  btn btn-secondary">< &nbsp;Back</a></li>
    @endisset
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">General Info</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('update_category',['id'=>$category->id])}}" class="">
                    @csrf

                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="">Name</label>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input name="name" id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" value="@if(old('name')){{old('name')}}@else{{$category->name}}@endif" >
                        </div>
                        <div class="form-group">
                            <label for="slug" class="">Url</label>
                            <input name="slug" id="slug" type="text" class="form-control" disabled value="">
                        </div>
                        <div class="form-group">
                            <label for="desc" class="">Description</label>
                            @error('desc')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" placeholder="Description">@if(old('desc')){{old('desc')}}@else{{$category->desc}}@endif</textarea>


                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->


        </div>
    </div>
@stop

