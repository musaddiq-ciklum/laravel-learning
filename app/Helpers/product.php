<?php
    //use Illuminate\Support\Facades\DB;


    if (! function_exists('getProductUrl')) {
        function getProductUrl($id=null)
        {
            if($id==null)
                return;

            $product = \App\Models\Product::find($id);
            $product_id = $product->id;
            $product_slug = $product->slug;
            $cat_slug = $product->category->slug;

            return url($cat_slug.'/'.$product_slug.'/'.$product_id) ;
        }
    }
