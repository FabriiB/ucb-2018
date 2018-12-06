<?php

namespace App\Http\Controllers;

use DemeterChain\C;
use Doctrine\DBAL\Schema\Column;
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

    public static function ShowPermision()

    {
        $Table = 'Permision';
        $Column = 'name';
        return ListDB::ShowPass($Table, $Column);
    }

    public static function ShowUser()

    {
        $Table = 'Users';
        $Column = 'firs_name';
        return ListDB::ShowPass($Table, $Column);
    }
}
