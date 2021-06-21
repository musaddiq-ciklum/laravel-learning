<?php
    //use Illuminate\Support\Facades\DB;


    if (! function_exists('getProductUrl')) {
        function getProductUrl($data=[])
        {
            $product_slug ='';
            $id = '';
            $cat_slug = '';
            extract($data);
            if($product_slug==''){
                $product = DB::table('products')
                    ->select('products.id','products.slug','categories.slug as cat_slug')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->where('products.id',$id)
                    ->first();

                $product_id = $product->id;
                $product_slug = $product->slug;
                $cat_slug = $product->cat_slug;
            }

            return url($cat_slug.'/'.$product_slug.'/'.$product_id) ;
        }
    }
