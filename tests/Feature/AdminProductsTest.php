<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tests\TestCase;

class AdminProductsTest extends TestCase
{
   
    public function test_item_can_be_added()
    {
        $category = Category::inRandomOrder()->first();
        //dd($category);
        Product::factory()
            ->count(1)
            ->for($category)
            ->create();

        $product_id = Product::orderBy('id', 'desc')->first()->id;
        $product = Product::find($product_id);
        $size = Size::inRandomOrder()->first()->id;
        $cost_price = Arr::random([50,65,70,100]);
        $active = rand(0,1);
        $product_size = [
            'id' => (ProductSize::orderBy('id', 'desc')->first()->id + 1),
            'cost_price'=>$cost_price,
            'sale_price'=>($cost_price/65)*100,
            'msrp'=>0,
            'stock'=>mt_rand(10,100),
            'in_stock'=>true,
            'is_default'=>true,
            'active'=>$active
        ];
        $res = $product->sizes()->attach($size,$product_size);
        $this->assertDatabaseHas('products', [
            'name' => $product->name,
        ]);
        $this->assertTrue( $product->id!== null);
    }

    public function test_item_can_be_added_using_controller()
    {
        $product = Product::factory()
            ->count(1)
            ->make()
            ->toArray();

        //dd($product[0]);

        $user = User::factory()->create();
        $user->assignRole('admin');

        $response = $this->actingAs($user)
            ->post('/admin/products',$product[0])
            ->assertStatus(302)
            ->assertSessionHas('success');

        $this->assertEquals(session('success'),'added');
    }
}
