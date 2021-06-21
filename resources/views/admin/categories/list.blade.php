@extends('admin/layouts.app')

@section('page_heading',$page_heading)
@section('page_sub_heading',$page_sub_heading)

@section('action_links')
    @isset($add_link)
        <a href="{{ $add_link }}" class="btn-shadow  btn btn-info">+ &nbsp; Add</a>
    @endisset
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">All Categories</h5>
                    @if($success)
                        <div class="alert alert-success fade show" role="alert">Category {{ $success }} successfully!</div>
                    @endif
                    <table class="mb-0 table table-striped table-hover"> {{--table-responsive--}}
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Is Active</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <?php
                            $cls = 'danger';
                            $label = 'De Active';
                            if($category->active){
                                $cls = 'success';
                                $label = 'Active';
                            }
                            ?>
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <div class="mb-2 mr-2 badge badge-pill badge-{{$cls}}">{{$label}}</div>
                                </td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="mb-2 mr-2 dropdown-toggle btn btn-info">Action</button>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                                            <a href="{{ url('admin/category/'.$category->id) }}" class="dropdown-item">View</a>
                                            <a href="{{ route('edit_category',['id'=>$category->id]) }}" class="dropdown-item">Edit</a>
                                            <form action="{{ route('delete_category',['id'=>$category->id]) }}" onsubmit="return confirm('Are you sure to delete this category?')" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="text-danger dropdown-item">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row"><div class="col-md-12 mt-3 pull-right"> {{ $categories->links() }}</div></div>

                </div>
            </div>
        </div>
    </div>
@stop

