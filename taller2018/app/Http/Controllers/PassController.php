<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Role;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ListDB;


class PassController extends Controller
{
    public function create(Request $request)
    {

    }

    public static function ShowPass()

    {
        $Table = 'Permision' ;
        $SentTable = str_replace("'", '', $Table);
        return ListDB::ShowPass($SentTable);
    }
}
