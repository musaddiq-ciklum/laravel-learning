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
                <div class="card-body"><h5 class="card-title">All Products</h5>
                    @if($success)
                        <div class="alert alert-success fade show" role="alert">Product {{ $success }} successfully!</div>
                    @endif
                    <table class="mb-0 table table-striped table-hover"> {{--table-responsive--}}
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Size</th>
                            <th>C.Price</th>
                            <th>S.Price</th>
                            <th>Is Active</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($products as $product)
                            @php
                                $default_size =  new stdClass();
                                $checked = '';
                                foreach($product->sizes as $size ):
                                    if($size->pivot->is_default == 1):
                                        $default_size = $size;
                                        if($size->pivot->active)
                                            $checked = 'checked';
                                        break;
                                    endif;
                                endforeach;
                            @endphp


                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    {{ $default_size->name }}
                                </td>
                                <td>{{ $default_size->pivot->cost_price }}</td>
                                <td>{{ $default_size->pivot->sale_price }}</td>
                                <td>
                                    <div class="mb-2 mr-2 badge badge-pill">
{{--                                        --}}
                                        <input class="status" type="checkbox" name="my-checkbox" {{ $checked }} data-bootstrap-switch data-off-color="danger" data-on-color="success" data-status="{{ $size->pivot->active }}" data-product_id="{{ $product->id }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="mb-2 mr-2 dropdown-toggle btn btn-info">Action</button>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                                            <a href="{{ route('products.show',$product->id) }}" class="dropdown-item">View</a>
                                            <a href="{{ route('products.edit',$product->id) }}" class="dropdown-item">Edit</a>
                                            <form action="{{ route('products.destroy',$product->id) }}" onsubmit="return confirm('Are you sure to delete this product?')" method="post">
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
                            if($products->isEmpty())
                                echo '<tr><td colspan="7" class="text-danger text-center">No product found!</td></tr>';
                        @endphp

                        </tbody>
                    </table>
                    <div class="row"><div class="col-md-12 mt-3 pull-right"> {{ $products->links() }}</div></div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('.status').change(function (){

                let product_id = $(this).attr('data-product_id');
                let status = $(this).attr('data-status');
                let url = '@php echo route('change_product_status')  @endphp';
                let token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: url,
                    type:'PUT',
                    data:{'product_id':product_id,'status':status,'_token':token},
                    success: function(data){
                        console.log('Success',data);
                        $(document).Toasts('create', {class:'bg-success',title: data.msg,close:false,autohide:true,delay:1500})
                    }
                });
            });
        });
    </script>
@stop

