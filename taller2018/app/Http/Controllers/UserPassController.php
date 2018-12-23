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



class UserPassController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            return view('userpass');
        }
        else
        {
            return view('auth.login')->withErrors('You are not logged in');
        }
    }

    public function destroy($id, $idr)
    {
        $todo= role_permision::find($id);
        DB::table('users_role')->where('id_users', $id)->where('id_role', $idr)->delete();

        return view('/userpass');
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

    public function AssignRole()
    {
        //dd( Input::all() );
        $role = new Role;
        $user = new User();
        $role->name = Input::get('assign_role');
        $user->firs_name = Input::get('assign_user');
        //////////////////////get values
        $fetch_user_id = User::where('firs_name',$user->firs_name)->pluck('id');
        $fetch_role_id = Role::where('name',$role->name)->pluck('id_role');

        collect($Search = DB::select(
            DB::raw("select count (id_role) 
            from users_role
            where $fetch_user_id[0] = id_users
            and $fetch_role_id[0] = id_role")
        ))->pluck('id_role')->toArray();

        ///////////////////insert values
        //dd( $Search[0]->count );

        if($Search[0]->count <=0)
        {
            $values = array('id_users' => $fetch_user_id[0], 'id_role' => $fetch_role_id[0]);
            DB::table('users_role')
                ->insert($values);
            return view('/userpass');
        }
        return view('/userpass');
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