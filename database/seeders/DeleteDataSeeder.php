<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DeleteDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        \DB::table('roles')->delete();
        \DB::table('permissions')->delete();
        \DB::table('role_has_permissions')->delete();
        \DB::table('model_has_roles')->delete();
        \DB::table('categories')->delete();
        \DB::table('posts')->delete();
        \DB::table('sizes')->delete();
        \DB::table('products')->delete();
        \DB::table('product_size')->delete();
    }
}
