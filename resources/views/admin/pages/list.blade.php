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
                <div class="card-body"><h5 class="card-title">All {{ $page_heading }}</h5>
                    @if($success)
                        <div class="alert alert-success fade show" role="alert">{{ $single_name }} {{ $success }} successfully!</div>
                    @endif
                    <table class="mb-0 table table-striped table-hover"> {{--table-responsive--}}
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>SEO Title</th>
                            <th>Meta Desc</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $page->name }}</td>
                                <td>{{ $page->slug }}</td>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->meta_desc }}</td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="mb-2 mr-2 dropdown-toggle btn btn-info">Action</button>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                                            <a href="{{ route('pages.show',$page->id) }}" class="dropdown-item">View</a>
                                            <a href="{{ route('pages.edit',$page->id) }}" class="dropdown-item">Edit</a>
                                            <form action="{{ route('pages.destroy',$page->id) }}" onsubmit="return confirm('Are you sure to delete this {{ $single_name }}?')" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="text-danger dropdown-item">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        @php
                            if($pages->isEmpty())
                                echo '<tr><td colspan="7" class="text-danger text-center">No '.$single_name.' found!</td></tr>';
                        @endphp

                        </tbody>
                    </table>
                    <div class="row"><div class="col-md-12 mt-3 pull-right"> {{ $pages->links() }}</div></div>

                </div>
            </div>
        </div>
    </div>
@stop

