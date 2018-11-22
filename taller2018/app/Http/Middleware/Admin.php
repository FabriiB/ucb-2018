<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)

    {
        $Cop = False;

        collect($Search = DB::select(
            DB::raw("select users.id
                from users, users_role
                where users.id = users_role.id_users")
        ))->pluck('id')->toArray();


        $UserSession = isset(Auth::user()->id);

        if(in_array($UserSession, $Search))
        {
            $Cop = True;
        }

        return $Cop;

    }
}
/*
DB::table('users')
    ->select('users.id','users.name','profiles.photo')
    ->join('profiles','profiles.id','=','users.id')
    ->where(['something' => 'something', 'otherThing' => 'otherThing'])
    ->get();*/