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
        <form method="post" action="{{route('products.update',['product'=>$product->id])}}" class="" style="width: 100%" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $product->id }}">
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
                                <input name="name" id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" value="@if(old('name')){{old('name')}}@else{{$product->name}}@endif" >
                            </div>
                            <label for="category_id" class="">Category</label>
                            @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" >
                                <option value="">Select</option>
                                @foreach($categories as $category)
                                    @php
                                        $form_cat = old('category_id');
                                        $db_cat = $product->category_id;
                                        $selected_cat = ($form_cat)?$form_cat:$db_cat;
                                        $selected = '';
                                        if($selected_cat == $category->id)
                                            $selected='selected';
                                    @endphp
                                    <option value="{{ $category->id }}" {{ $selected }} >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.card-body -->
                </div>
            <!-- /.card -->
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Pricing & Stock</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="cost_price" class="">Cost Price</label>
                            @error('cost_price')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input name="cost_price" id="cost_price" placeholder="Cost Price" type="text" class="form-control @error('cost_price') is-invalid @enderror" value="@if(old('cost_price')){{old('cost_price')}}@else{{$product->cost_price}}@endif" >
                        </div>
                        <div class="form-group">
                            <label for="sale_price" class="">Sale Price</label>
                            @error('sale_price')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input name="sale_price" id="sale_price" placeholder="Sale Price" type="text" class="form-control @error('sale_price') is-invalid @enderror" value="@if(old('sale_price')){{old('sale_price')}}@else{{$product->sale_price}}@endif" >
                        </div>
                        <div class="form-group">
                            <label for="cost_price" class="">Stock</label>
                            @error('stock')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input name="stock" id="stock" placeholder="Stock" type="text" class="form-control @error('stock') is-invalid @enderror" value="@if(old('stock')){{old('stock')}}@else{{$product->stock}}@endif" >
                        </div>


                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Variations</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <h5>Size</h5>
                            @error('size')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @foreach($sizes as $size)
                                @php
                                    $form_size = old('size');
                                    $db_size = $product->size_id;
                                    $selected_size = ($form_size)?$form_size:$db_size;
                                    $checked = '';
                                    if($selected_size == $size->id)
                                        $checked='checked';
                                @endphp
                                <div class="position-relative form-check">
                                    <label class="form-check-label"><input name="size" type="radio" class="form-check-input" {{ $checked }}  value="{{ $size->id }}">
                                        {{ $size->name }}</label>
                                </div>
                            @endforeach
                            <br />
                            <h5>Color</h5>
                            @error('color')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @foreach($colors as $color)
                                @php
                                    $form_color = old('color');
                                    $db_color = $product->color_id;
                                    $selected_color = ($form_color)?$form_color:$db_color;
                                    $checked = '';
                                    if($selected_color == $color->id)
                                        $checked='checked';
                                @endphp
                                <div class="position-relative form-check">
                                    <label class="form-check-label"><input name="color" type="radio" class="form-check-input" {{ $checked }} value="{{ $color->id }}">
                                        {{ $color->name }}</label>
                                </div>
                            @endforeach

                            <br />
                            <button id="add_variation" class="btn btn-secondary">Add Variation</button>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Image & Gallery</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="image" class="">Image</label><br />
                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="file" name="image" id="image" class=" @error('image') is-invalid @enderror" />
                            <br />
                           <img src="{{ asset(env('PRODUCT_THUMB_SMALL_PATH').'/'.$product->image) }}"width="100" alt="" />
                        </div>
                        <div class="orm-group">
                            <label for="gallery" class="">Gallery</label><br />
                            @error('gallery[]')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="file" name="gallery[]" />
                        </div>
                        <div class="form-group">
                            <input type="file" name="gallery[]" />
                        </div>

                        <div class="form-group">
                            <input type="file" name="gallery[]" />
                        </div>

                        <div class="form-group">
                            <input type="file" name="gallery[]" />
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Description</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="short_desc" class="">Short Description</label>
                            @error('short_desc')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <textarea name="short_desc" id="short_desc" class="form-control @error('short_desc') is-invalid @enderror" placeholder="Description">@if(old('short_desc')){{old('short_desc')}}@else{{$product->short_desc}}@endif</textarea>
                        </div>

                        <div class="form-group">
                            <label for="long_desc" class="">Long Description</label>
                            @error('long_desc')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <textarea name="long_desc" id="long_desc" class="form-control summernote @error('long_desc') is-invalid @enderror" placeholder="Description">@if(old('long_desc')){{old('long_desc')}}@else{{$product->long_desc}}@endif</textarea>
                        </div>
                    </div>
                </div>
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
                            <input name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="@if(old('title')){{old('title')}}@else{{$product->title}}@endif">
                        </div>

                        <div class="position-relative form-group">
                            <label for="long_desc" class="">Meta Description</label>
                            @error('meta_desc')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <textarea name="meta_desc" id="meta_desc" class="form-control @error('meta_desc') is-invalid @enderror" placeholder="Description">@if(old('meta_desc')){{old('meta_desc')}}@else{{$product->meta_desc}}@endif</textarea>
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

