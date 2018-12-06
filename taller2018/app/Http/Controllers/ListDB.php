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

    public static function ShowPass($Table, $Column)

    {
        $SentTable = str_replace("'", '', $Table);
        $SentColumn = str_replace("'", '', $Column);

        collect($Search = DB::select(
            DB::raw("select $SentColumn 
            from $SentTable")
        ))->pluck('name')->toArray();

        return $Search;
    }
}
