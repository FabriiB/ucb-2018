<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;

use Closure;
use Illuminate\Support\Facades\Auth;

class EntryRodrigo
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
        $Look=collect($Search = DB::select(
            DB::raw("select u.id 
            from users u, users_role ur, role_permision rp 
            where u.id=ur.id_users 
            and ur.id_role=rp.id_role
            and rp.id_permision=1;")
        ))->pluck('id')->toArray();


        $id = Auth::id();

        if(in_array($id, $Look))
        {
            return $next($request);
        }

        else
        {
            return abort(403, "No access here, sorry!");
        }


    }
}


//Object of class stdClass could not be converted to intselect u.id from users u, users_role ur, role_permision rp where u.id=ur.id_users and ur.id_role=rp.id_role and rp.id_permision=1;