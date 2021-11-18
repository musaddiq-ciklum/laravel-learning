<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1001,
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'email_verified_at' => '2021-08-24 00:00:00',
                'password' => '$2y$10$r7jEhG3l8YFKoAV3eGNA/elAAiq/PMuFctPCXOlfFGjrh5y.WSU5.',
                'remember_token' => NULL,
                'created_at' => '2021-08-24 00:00:00',
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 1002,
                'name' => 'Writer',
                'email' => 'writer@example.com',
                'email_verified_at' => '2021-08-24 00:00:00',
                'password' => '$2y$10$.pORqGdO8owCynm.svW3uO2sYHnG3SUUR.7./bkIv6MXnS/7CeO9G',
                'remember_token' => NULL,
                'created_at' => '2021-08-24 00:00:00',
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 1003,
                'name' => 'Editor',
                'email' => 'editor@example.com',
                'email_verified_at' => '2021-08-24 00:00:00',
                'password' => '$2y$10$DQMbODD7DPCSPyKRAnin9eBDVIR841uTVpN74T4IWVPHI8zqFU09y',
                'remember_token' => NULL,
                'created_at' => '2021-08-24 00:00:00',
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 1004,
                'name' => 'Publisher',
                'email' => 'publisher@example.com',
                'email_verified_at' => '2021-08-24 00:00:00',
                'password' => '$2y$10$EgCcqbYctGXwCB3Ywudhl.1G.hh3ZzXBSto2W./kkVQtuEE62mB0a',
                'remember_token' => NULL,
                'created_at' => '2021-08-24 00:00:00',
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'id' => 1005,
                'name' => 'User',
                'email' => 'user@example.com',
                'email_verified_at' => '2021-08-24 00:00:00',
                'password' => '$2y$10$SP3FmEoGAudYovC/6ZEL5uIQoIp052CtZinBU0hXY6313jVCzsve2',
                'remember_token' => NULL,
                'created_at' => '2021-08-24 00:00:00',
                'updated_at' => NULL,
            )
        ));


    }
}
