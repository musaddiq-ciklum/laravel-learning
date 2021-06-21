<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    function getRow($data=[]){
        extract($data);
        //->leftJoin('product_variants', 'product_variants.product_id', '=', 'products.id')->where('product_variants.is_default', '=', 1)
        $product = DB::table('products')
            ->leftJoin('product_variants as pv', function ($join) {
                $join->on('pv.product_id', '=', 'products.id')
                ->where('pv.is_default', '=', 1);
            })
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name','pv.size_id','pv.color_id','pv.cost_price','pv.sale_price','pv.stock','pv.in_stock')
            ->where($where)
            ->first();
        return $product;
    }

    function getRows($data=[]){
        $order_column = 'id';
        $order = 'desc';
        $where=[];
        extract($data);
        $products = DB::table('products')
            ->leftJoin('product_variants as pv', function ($join) {
                $join->on('pv.product_id', '=', 'products.id')
                    ->where('pv.is_default', '=', 1);
            })
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name','pv.size_id','pv.color_id','pv.cost_price','pv.sale_price','pv.stock','pv.in_stock')
            ->where($where)
            ->orderBy($order_column, $order)
            ->paginate(env('PAGING_PER_PAGE', 20));
        return $products;
    }

    function get($data=array()){

    }
}
