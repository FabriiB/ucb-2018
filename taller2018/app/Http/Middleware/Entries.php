<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;

use Closure;
use Illuminate\Support\Facades\Auth;

class Entries
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public static function handle($request, Closure $next, int $permision_num)
    {
        $Look=collect($Search = DB::select(
            DB::raw("select u.id 
            from users u, users_role ur, role_permision rp 
            where u.id=ur.id_users 
            and ur.id_role=rp.id_role
            and rp.id_permision=$permision_num;")
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
