<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        $title1 = 'Listado de usuarios';
        $title2 = 'Eliminacion de usuarios';
        return view('users.index', compact('title1', 'users', 'title2'));
    }

    public function destroy(Request $request) {
        $user = User::findOrFail($request->id);
        $user->delete();


        return redirect('usuarios');
    }

    
}
