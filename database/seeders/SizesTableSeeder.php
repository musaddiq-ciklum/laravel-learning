<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sizes')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Small',
                'created_at' => '2021-08-25 15:07:08',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Large',
                'created_at' => '2021-08-25 15:10:08',
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));


    }
}
