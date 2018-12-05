<?php

namespace App\Http\Middleware;

use Closure;

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
        $entry = new Entries();

        $entry::handle($request, $next, 1);

        return $next($request);
    }
}


//Object of class stdClass could not be converted to intselect u.id from users u, users_role ur, role_permision rp where u.id=ur.id_users and ur.id_role=rp.id_role and rp.id_permision=1;