<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Add users starting from 1001 to avoid conflict
        DB::table('users')->insert([
            'id'=>1001,
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('A1@google'),
            'created_at'=>today(),
            'email_verified_at'=>today()
        ]);
        DB::table('users')->insert([
            'id'=>1002,
            'name' => 'Writer',
            'email' => 'writer@example.com',
            'password' => Hash::make('A1@google'),
            'created_at'=>today(),
            'email_verified_at'=>today()
        ]);
        DB::table('users')->insert([
            'id'=>1003,
            'name' => 'Editor',
            'email' => 'editor@example.com',
            'password' => Hash::make('A1@google'),
            'created_at'=>today(),
            'email_verified_at'=>today()
        ]);
        DB::table('users')->insert([
            'id'=>1004,
            'name' => 'Publisher',
            'email' => 'publisher@example.com',
            'password' => Hash::make('A1@google'),
            'created_at'=>today(),
            'email_verified_at'=>today()
        ]);
        DB::table('users')->insert([
            'id'=>1005,
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('A1@google'),
            'created_at'=>today(),
            'email_verified_at'=>today()
        ]);

        //Define Roles
        DB::table('roles')->insert([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);
        DB::table('roles')->insert([
            'name' => 'writer',
            'guard_name' => 'web'
        ]);
        DB::table('roles')->insert([
            'name' => 'editor',
            'guard_name' => 'web'
        ]);
        DB::table('roles')->insert([
            'name' => 'publisher',
            'guard_name' => 'web'
        ]);
        DB::table('roles')->insert([
            'name' => 'user',
            'guard_name' => 'web'
        ]);

        //Adding permissions
        DB::table('permissions')->insert([
            'name' => 'create post',
            'guard_name' => 'web'
        ]);
        DB::table('permissions')->insert([
            'name' => 'edit post',
            'guard_name' => 'web'
        ]);
        DB::table('permissions')->insert([
            'name' => 'delete post',
            'guard_name' => 'web'
        ]);
        DB::table('permissions')->insert([
            'name' => 'publish post',
            'guard_name' => 'web'
        ]);


        //Add permissions to roles
        DB::table('role_has_permissions')->insert([
            'permission_id' => '1',
            'role_id' => '1'
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => '2',
            'role_id' => '1'
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => '2',
            'role_id' => '2'
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => '3',
            'role_id' => '1'
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => '3',
            'role_id' => '2'
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => '3',
            'role_id' => '3'
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => '4',
            'role_id' => '1'
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => '4',
            'role_id' => '2'
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => '4',
            'role_id' => '3'
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => '4',
            'role_id' => '4'
        ]);

        //Add roles to users
        DB::table('model_has_roles')->insert([
            'role_id' => '1',
            'model_type' => 'App\Models\User',
            'model_id' => '1001'
        ]);
        DB::table('model_has_roles')->insert([
            'role_id' => '2',
            'model_type' => 'App\Models\User',
            'model_id' => '1002'
        ]);
        DB::table('model_has_roles')->insert([
            'role_id' => '3',
            'model_type' => 'App\Models\User',
            'model_id' => '1003'
        ]);
        DB::table('model_has_roles')->insert([
            'role_id' => '4',
            'model_type' => 'App\Models\User',
            'model_id' => '1004'
        ]);
        DB::table('model_has_roles')->insert([
            'role_id' => '5',
            'model_type' => 'App\Models\User',
            'model_id' => '1005'
        ]);
    }
}
