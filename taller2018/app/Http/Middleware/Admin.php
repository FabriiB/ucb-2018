<?php

namespace App\Http\Middleware;

use Closure;

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
        $Search = DB::select(
            DB::raw("select 'id_person' 
            from 'person', 'person_role'
            where 'person.id_person' = 'person_role.id_person'
            and 'person_role.id_role ' = 1")
            )->pluck('id_person')->toArray();

        $UserSession = isset(Auth::person()->id_person);

        if(in_array($UserSession, $Search)){

            return $next($request);

        }

        return redirect('home')->with('error','You have not admin access');

    }
}

DB::table('users')
    ->select('users.id','users.name','profiles.photo')
    ->join('profiles','profiles.id','=','users.id')
    ->where(['something' => 'something', 'otherThing' => 'otherThing'])
    ->get();