<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permision;
use App\Role;

class PermisionController extends Controller
{
    public function create(Request $request)
    {
        $Permision = new Permision();
        $Permision->name = 'Administrator';
        $Permision->description = 'user with administrator permision';

        $Permision->save();

        $role = Role::find([1, 3]);
        $Permision->roles->attach($role);

        return 'Success';
    }
}
