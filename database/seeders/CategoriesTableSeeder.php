<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('categories')->insert(array (
            0 =>
            array (
                'name' => 'Bedroom',
                'slug' => 'bedroom',
                'desc' => 'Bedroom Products',
                'active' => true,
                'created_at' => '2021-08-25 10:29:09',
                'updated_at' => '2021-08-25 10:29:09',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'name' => 'Living Room',
                'slug' => 'living-room',
                'desc' => 'Living Room Products',
                'active' => true,
                'created_at' => '2021-09-30 00:00:00',
                'updated_at' => '2021-09-30 00:00:00',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'name' => 'Dining Room',
                'slug' => 'dining-room',
                'desc' => 'Dining Room Products',
                'active' => true,
                'created_at' => '2021-09-30 00:00:00',
                'updated_at' => '2021-09-30 00:00:00',
                'deleted_at' => NULL,
            ),
        ));
    }
}
