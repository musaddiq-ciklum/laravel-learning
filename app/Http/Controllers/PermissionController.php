<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //

    function create(){

       /*$role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'edit posts']);

        $role->givePermissionTo($permission);*/

        //Give permission to roles
        /*$role = Role::findById(3);
        $permission = Permission::findById(4);
        $role->givePermissionTo($permission);*/

        //Give role to users
        /*$user = User::find(4);
        $user->assignRole('publisher');*/

        //Give permission to Role
        $role = Role::findByName('admin');
        $role->givePermissionTo('edit post');
        dd($role);



        //dd($user);
    }

    function adminPage(){
        echo 'Admin page';
    }

    function writerPage(){
        echo 'Writer page';
    }
}
