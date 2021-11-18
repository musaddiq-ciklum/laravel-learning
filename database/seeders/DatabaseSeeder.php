<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        /*$this->call([
            //CategorySeeder::class,
            ProductSeeder::class
        ]);*/
        $this->call(DeleteDataSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(SizesTableSeeder::class);
        //$this->call(ProductSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductSizeTableSeeder::class);
    }
}
