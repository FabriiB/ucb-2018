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



class PermissionPassController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            return view('passpermission');
        }
        else
        {
            return view('auth.login')->withErrors('You are not logged in');
        }
    }

    public function destroy($id)
    {
        $todo= role_permision::find($id);
        DB::table('permision')->where('id_permision', $id)->delete();

        return view('/passpermission');
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
        ///////////////////insert values
        $values = array('id_users' => $fetch_user_id[0],'id_role' => $fetch_role_id[0]);
        DB::table('users_role')
            ->insert($values);
        return view('/userpass');
    }

    public function DeleteRole($id)
    {
        collect($Search = DB::select(
            DB::raw("select count (id_permision) 
            from role_permision
            where $id = id_role")
        ))->pluck('id_role')->toArray();

        if ($Search == null)
        {
            DB::table('role_permision')->where('id_permision', $id)->delete();

            return view('pass');
        }

        return view('pass');

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