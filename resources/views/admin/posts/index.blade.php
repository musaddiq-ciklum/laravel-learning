@extends('admin/layouts.app')

@section('page_heading',$page_heading)
@section('page_sub_heading',$page_sub_heading)

@section('action_links')
    @isset($add_link)
        @can('write post')
            <a href="{{ $add_link }}" class="btn-shadow  btn btn-info">+ &nbsp; Add</a>
        @endcan
    @endisset
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">All Posts</h5>
                    @if($success)
                        <div class="alert alert-success fade show" role="alert">Post {{ $success }} successfully!</div>
                    @endif
                    <table class="mb-0 table table-striped table-hover"> {{--table-responsive--}}
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Contents</th>
                            <th>User</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->contents }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="mb-2 mr-2 dropdown-toggle btn btn-info">Action</button>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                                            @can('edit post')
                                                <a href="{{ route('posts.edit',$post) }}" class="dropdown-item">Edit</a>
                                            @endcan
                                            @can('publish post')
                                                <button
                                                    class="publish dropdown-item"
                                                    data-published="{{ $post->published }}"
                                                    data-post_id="{{ $post->id }}"
                                                >
                                                @if($post->published){{ 'Un publish' }}@else{{ 'Publish' }}@endif
                                                </button>

                                            @endcan
                                            @can('create post')
                                                <form action="{{ route('posts.destroy',$post) }}" onsubmit="return confirm('Are you sure to delete this post?')" method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="text-danger dropdown-item">Delete</button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        @php
                            if($posts->isEmpty())
                                echo '<tr><td colspan="7" class="text-danger text-center">No product found!</td></tr>';
                        @endphp

                        </tbody>
                    </table>
                    <div class="row"><div class="col-md-12 mt-3 pull-right"> {{ $posts->links() }}</div></div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.publish').click(function (){

                let post_id = $(this).attr('data-post_id');
                let published = $(this).attr('data-published');

                let url = '{{ route('posts.publish',':post_id') }}';
                url = url.replace(':post_id', post_id);

                if(published==1){
                    $(this).text('Publish');
                    $(this).attr('data-published',0);
                }else{
                    $(this).text('Un Publish');
                    $(this).attr('data-published',1);
                }

                $.ajax({
                    url: url,
                    type:'PUT',
                    data:{'published':published},
                    success: function(data){
                        $(document).Toasts('create', {class:'bg-success',title: data.msg,close:false,autohide:true,delay:1500})
                    }
                });
            });
        });
    </script>
@stop

