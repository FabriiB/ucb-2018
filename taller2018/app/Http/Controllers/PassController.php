<?php

namespace App\Http\Controllers;

use App\User;
use DemeterChain\C;
use Doctrine\DBAL\Schema\Column;
use Illuminate\Http\Request;
use App\Permision;
use App\Role;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ListDB;
use Illuminate\Support\Facades\Input;


class PassController extends Controller
{
    public function create(Request $request)
    {

    }

    public static function ShowPermision()

    {
        $Table = 'Permision';
        $Column = 'name';
        return ListDB::ShowPass($Table, $Column);
    }

    public static function ShowUser()

    {
        $Table = 'Users';
        $Column = 'firs_name';
        return ListDB::ShowPass($Table, $Column);
    }

    public static function ShowRole()

    {
        $Table = 'Role';
        $Column = 'name';
        return ListDB::ShowPass($Table, $Column);
    }

    public function AddNewRole()
    {
        dd( Input::all() );

        $role = new Role;
        $permission = new Permision;
        $user = new User;

        $role->name = Input::get('new_role');
        $permission->name = Input::get('new_permission');
        $user->name = Input::get('new_user');

        DB::insert(
            DB::raw(
                "insert into users_role (id_users, id_role)
                values (users, users_role)"));


        $role->save();


        return Redirect::back();
    }

}



