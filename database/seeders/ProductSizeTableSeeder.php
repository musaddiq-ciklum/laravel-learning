<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSizeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('product_size')->insert(array (
            0 =>
            array (
                'product_id' => 1,
                'size_id' => 1,
                'cost_price' => '100.00',
                'sale_price' => '153.85',
                'msrp' => '0.00',
                'stock' => 23,
                'in_stock' => true,
                'is_default' => true,
                'active' => false,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'product_id' => 2,
                'size_id' => 2,
                'cost_price' => '100.00',
                'sale_price' => '153.85',
                'msrp' => '0.00',
                'stock' => 29,
                'in_stock' => true,
                'is_default' => true,
                'active' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'product_id' => 3,
                'size_id' => 2,
                'cost_price' => '65.00',
                'sale_price' => '100.00',
                'msrp' => '0.00',
                'stock' => 60,
                'in_stock' => true,
                'is_default' => true,
                'active' => false,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'product_id' => 1,
                'size_id' => 1,
                'cost_price' => '70.00',
                'sale_price' => '107.69',
                'msrp' => '0.00',
                'stock' => 87,
                'in_stock' => true,
                'is_default' => true,
                'active' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'product_id' => 2,
                'size_id' => 2,
                'cost_price' => '100.00',
                'sale_price' => '153.85',
                'msrp' => '0.00',
                'stock' => 66,
                'in_stock' => true,
                'is_default' => true,
                'active' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array (
                'product_id' => 3,
                'size_id' => 2,
                'cost_price' => '100.00',
                'sale_price' => '153.85',
                'msrp' => '0.00',
                'stock' => 97,
                'in_stock' => true,
                'is_default' => true,
                'active' => false,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 =>
            array (
                'product_id' => 4,
                'size_id' => 2,
                'cost_price' => '50.00',
                'sale_price' => '76.92',
                'msrp' => '0.00',
                'stock' => 18,
                'in_stock' => true,
                'is_default' => true,
                'active' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 =>
            array (
                'product_id' => 5,
                'size_id' => 1,
                'cost_price' => '70.00',
                'sale_price' => '107.69',
                'msrp' => '0.00',
                'stock' => 94,
                'in_stock' => true,
                'is_default' => true,
                'active' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 =>
            array (
                'product_id' => 6,
                'size_id' => 2,
                'cost_price' => '100.00',
                'sale_price' => '153.85',
                'msrp' => '0.00',
                'stock' => 19,
                'in_stock' => true,
                'is_default' => true,
                'active' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 =>
            array (
                'product_id' => 7,
                'size_id' => 1,
                'cost_price' => '65.00',
                'sale_price' => '100.00',
                'msrp' => '0.00',
                'stock' => 12,
                'in_stock' => true,
                'is_default' => true,
                'active' => false,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 =>
            array (
                'product_id' => 8,
                'size_id' => 1,
                'cost_price' => '70.00',
                'sale_price' => '107.69',
                'msrp' => '0.00',
                'stock' => 82,
                'in_stock' => true,
                'is_default' => true,
                'active' => false,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 =>
            array (
                'product_id' => 9,
                'size_id' => 1,
                'cost_price' => '65.00',
                'sale_price' => '100.00',
                'msrp' => '0.00',
                'stock' => 13,
                'in_stock' => true,
                'is_default' => true,
                'active' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 =>
            array (
                'product_id' => 10,
                'size_id' => 2,
                'cost_price' => '65.00',
                'sale_price' => '100.00',
                'msrp' => '0.00',
                'stock' => 49,
                'in_stock' => true,
                'is_default' => true,
                'active' => true,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));


    }
}
