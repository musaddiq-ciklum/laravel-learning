<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;

use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = Category::inRandomOrder()->first()->id;

        $name =$this->faker->text(50);
        $cost_price = Arr::random([50,65,70,100]);
        $sale_price = number_format(($cost_price/65)*100,2);
        $stock = Arr::random([10,20,50,100]);
        $size = Size::inRandomOrder()->first()->id;

        return [
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'short_desc' => $this->faker->text(50),
            'long_desc' => $this->faker->text(),
            'title'=>$name,
            'meta_desc'=> $this->faker->text(15),
            'active' => rand(0,1),
            'image'=>'',
            'category_id'=>$category,
            'cost_price' => $cost_price,
            'sale_price' => $sale_price,
            'stock' => $stock,
            'size' => $size,

        ];
    }
}
