<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\Category;
use App\Models\Product;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$category = Category::inRandomOrder(['id'])->first();

        $products = Product::factory()
            ->count(10)
            ->for(Category::inRandomOrder(['id'])->first())
            ->afterMaking(function ($product){
                unset($product->cost_price);
                unset($product->sale_price);
                unset($product->stock);
                unset($product->size);
            })
            ->create();

        foreach (Product::all() as $product){
            $cost_price = Arr::random([50,65,70,100]);
            $active = rand(0,1);
            $size = Size::inRandomOrder()->first()->id;
            $product_size = [
                'cost_price'=>$cost_price,
                'sale_price'=>($cost_price/65)*100,
                'msrp'=>0,
                'stock'=>mt_rand(10,100),
                'in_stock'=>true,
                'is_default'=>true,
                'active'=>$active
            ];
            $product->sizes()->attach($size,$product_size);
        }
    }
}
