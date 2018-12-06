<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Role;
use Illuminate\Support\Facades\DB;


class ListDB extends Controller
{
    public function create(Request $request)
    {

    }

    public static function ShowPass($Table)

    {
        collect($Search = DB::select(
            DB::raw("select name 
            from $Table")
        ))->pluck('name')->toArray();

        return $Search;
    }
}
