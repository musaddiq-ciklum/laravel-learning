<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductVariants;

class ProductController extends Controller
{
    protected $page_heading = 'Products';
    protected $page_sub_heading = 'Sub heading';
    protected $add_link = '';
    protected $main_page = '';

    protected $categories = [];
    protected $sizes = [];
    protected $colors = [];
    protected $productModel = null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->productModel = new Product();

        $this->main_page = route('products.index');
        $this->add_link = route('products.create');

        $this->categories = Category::all();
        $this->sizes = DB::table('sizes')
            ->get();
        $this->colors = DB::table('colors')
            ->get();
    }



    public function index(Request $request)
    {
        $product_data=[
            'where'=>[]
        ];
        $products = $this->productModel->getRows($product_data);
        //dd($products);
        //
        //Extra fields
        /*in stock
        active*/
        //Fields in variants table (in stock and prices)
        /*echo 'Product listing...'.route('products.index').'<br />';
        echo 'Product create...'.route('products.create').'<br />';
        echo 'Product store...'.route('products.store').'<br />';
        echo 'Product show...'.route('products.show',5).'<br />';
        echo 'Product edit...'.route('products.edit',5).'<br />';
        echo 'Product delete...'.route('products.destroy',5).'<br />';*/

        $data=[
            'products'=>$products,
            'success'=>$request->session()->get('success'),
            'page_heading'=>$this->page_heading,
            'page_sub_heading'=>$this->page_sub_heading,
            'add_link'=>$this->add_link
        ];
        return view('admin.products.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'page_heading'=>$this->page_heading,
            'page_sub_heading'=>$this->page_sub_heading,
            'main_page'=>$this->main_page,
            'categories'=>$this->categories,
            'sizes'=>$this->sizes,
            'colors'=>$this->colors
        ];
        return view('admin.products.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //echo $request->file('image')->getClientOriginalExtension();exit;
        //echo '<pre>';print_r($input);exit;
        //echo $request->input('image');exit;
//        $request->file('image')->storeAs('uploads/products', 'abc123.jpg');
//        exit;
        $validated = $request->validated();

        $product = new Product;
        $product->name = $request->input('name');
        $product->slug = Str::slug($product->name, '-');
        $product->category_id = $request->input('category_id');
        $product->active = '1';
        //$product->image = $request->file('image')->storeAs('uploads/products', $fileName);
        //$product->gallery = $request->input('gallery');
        $product->short_desc = $request->input('short_desc');
        $product->long_desc = $request->input('long_desc');
        $product->title = $request->input('title');
        $product->meta_desc = $request->input('meta_desc');
        $product->save();
        $product_id = $product->id;

        $variant = new ProductVariants;
        $variant->product_id = $product_id;
        $variant->size_id = $request->input('size');
        $variant->color_id = $request->input('color');
        $variant->cost_price = $request->input('cost_price');
        $variant->sale_price = $request->input('sale_price');
        $variant->msrp = '0';
        $variant->is_default = '1';
        $variant->stock = $request->input('stock');
        $variant->save();

        //Upload image and thumbnails
        $this->upload_image($request, $product_id, $product->slug);

        $request->session()->flash('success', 'added');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_data=[
            'where'=>['products.id'=>$id],
            'singleRow'=>true
        ];
        $product = $this->productModel->getRow($product_data);

        $data = [
            'page_heading'=>$this->page_heading,
            'page_sub_heading'=>$this->page_sub_heading,
            'main_page'=>$this->main_page,
            'product'=>$product,
            'categories'=>$this->categories,
            'sizes'=>$this->sizes,
            'colors'=>$this->colors
        ];
        return view('admin.products.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $validated = $request->validated();

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->slug = Str::slug($product->name, '-');
        $product->category_id = $request->input('category_id');
        $product->short_desc = $request->input('short_desc');
        $product->long_desc = $request->input('long_desc');
        $product->title = $request->input('title');
        $product->meta_desc = $request->input('meta_desc');
        $product->save();

        $variant = ProductVariants::where('product_id', $id)
            ->where('is_default',1)->first();
        $variant->size_id = $request->input('size');
        $variant->color_id = $request->input('color');
        $variant->cost_price = $request->input('cost_price');
        $variant->sale_price = $request->input('sale_price');
        $variant->stock = $request->input('stock');
        $variant->save();

        $this->upload_image($request, $id, $product->slug);

        $request->session()->flash('success', 'updated');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function upload_image($request,$id,$slug){

        if (!is_dir(public_path(env('PRODUCT_IMG_PATH')))) {
            mkdir(public_path(env('PRODUCT_IMG_PATH')), 0775, true);
        }
        if (!is_dir(public_path(env('PRODUCT_THUMB_LARGE_PATH')))) {
            mkdir(public_path(env('PRODUCT_THUMB_LARGE_PATH')), 0775, true);
        }
        if (!is_dir(public_path(env('PRODUCT_THUMB_SMALL_PATH')))) {
            mkdir(public_path(env('PRODUCT_THUMB_SMALL_PATH')), 0775, true);
        }

        //Save with original size
        if($request->file('image')) {
            $imgName = $slug.'.'.$request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image')->getRealPath())
                ->save(public_path(env('PRODUCT_IMG_PATH') . '/' . $imgName));

            //Save large thumbnail
            $img = Image::make($request->file('image')->getRealPath());
            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
                ->save(public_path(env('PRODUCT_THUMB_LARGE_PATH') . '/' . $imgName));

            //Save small thumbnail
            $img = Image::make($request->file('image')->getRealPath());
            $img->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
                ->save(public_path(env('PRODUCT_THUMB_SMALL_PATH') . '/' . $imgName));

            $product = Product::find($id);
            $product->image = $imgName;
            $product->save();
        }
    }

    function change_status(Request $request){

        $product = Product::find($request->input('product_id'));
        $product->active = ! ($request->input('status'));
        $product->save();

        $msg = 'Product is activated';
        if($product->active ===false)
            $msg = 'Product is deactivated';
        $response = array(
            'status' => 'success',
            'msg' => $msg
        );
        return response()->json($response);
    }
}
