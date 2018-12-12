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
    public static function check()

    {
        $Cop = False;

        collect($Search = DB::select(
            DB::raw("select u.id 
            from users u, users_role ur, role_permision rp 
            where u.id=ur.id_users 
            and ur.id_role=rp.id_role
            and rp.id_permision=3;")
        ))->pluck('id')->toArray();

        $UserSession = isset(auth()->user()->id);

        if(in_array($UserSession, $Search))
        {
            $Cop = True;
        }

        return $Cop;

    }

    public static function handle($request, Closure $next)

    {
        $entry = new Entries();

        $entry::handle($request, $next, 3);

        return $next($request);

    }


}
