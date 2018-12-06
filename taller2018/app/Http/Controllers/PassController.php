<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Role;
use Illuminate\Support\Facades\DB;


class PassController extends Controller
{
    public function create(Request $request)
    {

    }

    public static function ShowPass()

    {
        collect($Search = DB::select(
            DB::raw("select name 
            from permision p")
        ))->pluck('name')->toArray();

        foreach ($Search as $search)
        {

        }


        return $Search;

    }
}
