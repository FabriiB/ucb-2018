<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Role;

class RoleController extends Controller
{
    public function create(Request $request)
    {
        $role = new Role;
        $role->name = 'Admin';
        $role->description = 'user with admin role';

        $role->save();

        $person = Person::find([1, 3]);
        $role->persons->attach($person);

        return 'Success';
    }
}
