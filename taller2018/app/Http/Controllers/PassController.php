<?php

namespace App\Http\Controllers;

use App\role_permision;
use App\User;
use DemeterChain\C;
use Doctrine\DBAL\Schema\Column;
use Illuminate\Http\Request;
use App\Permision;
use App\Role;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ListDB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;



class PassController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            return view('pass');
        }
        else
        {
            return view('auth.login')->withErrors('You are not logged in');
        }
    }

    public static function add($id_permision, $id_role)
    {
        $role_permision = new role_permision();

        $role_permision->id_role = $id_role;
        $role_permision->id_permision = $id_permision;
        $role_permision->save();
        return view('pass');
    }

    public function destroy($id)
    {
        $todo= role_permision::find($id);
        $todo->delete();
        return view('pass');

    }

    public static function ShowRolePermision($Table, $Column, $PluckVar)

    {
        $SentTable = str_replace("'", '', $Table);
        $SentColumn = str_replace("'", '', $Column);

        collect($Search = DB::select(
            DB::raw("select $SentColumn 
            from $SentTable")
        ))->pluck($PluckVar)->toArray();

        return $Search;
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
        //dd( Input::all() ); uncomment to see values being passed

        $role = new Role;
        $permission = new Permision;
        $user = new User;

        $role->name = Input::get('new_role');
        $permission->name = Input::get('new_permission');
        $user->name = Input::get('new_user');
        $role->save();
        //////////////////////get values

        $fetch_user_id = User::where('firs_name',$user->name)->pluck('id');
        $fetch_role_id = Role::where('name',$role->name)->pluck('id_role');
        $fetch_permission_id = Permision::where('name',$permission->name)->pluck('id_permision');


        ///////////////////insert values

        $values = array('id_users' => $fetch_user_id[0],'id_role' => $fetch_role_id[0]);
        DB::table('users_role')
            ->insert($values);

        $values = array('id_role' => $fetch_role_id[0],'id_permision' => $fetch_permission_id[0]);
        DB::table('role_permision')
            ->insert($values);


        return view('pass');
    }

    public function AssignRole()
    {
        //dd( Input::all() );

        $role = new Role;
        $permision = new Permision();

        $role->name = Input::get('assign');
        $permision->name = Input::get('assign_permision');
        //////////////////////get values

        $fetch_permision_id = User::where('firs_name',$permision->name)->pluck('id');
        $fetch_role_id = Role::where('name',$role->name)->pluck('id_role');

        ///////////////////insert values

        $values = array('id_permision' => $fetch_permision_id[0],'id_role' => $fetch_role_id[0]);
        DB::table('role_permision')
            ->insert($values);

        return view('/pass');
    }

}


/*
DB::statement(
    DB::raw(
        "insert into users_role (id_users, id_role)
                values ($fetch_user_id, $fetch_role_id)"));
DB::statement(
    DB::raw(
        "insert into role_permission (id_role, id_permission)
                values ($fetch_role_id, $fetch_permission_id)"));


        $fetch_role_id=collect($Search = DB::select(
            DB::raw("select r.id
            from role r
            where r.name=$role->name;")
        ));*/