<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;

use Closure;
use Illuminate\Support\Facades\Auth;
class EntryFabrisio
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

        $entry::handle($request, $next, 4);

        return $next($request);
    }
}
