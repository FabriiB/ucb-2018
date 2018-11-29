<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/mi_cuenta';
    protected $redirectAfterLogout = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

/*
public function redirectTo()
{
    $role = User::with('users_role:id_role')->get();
    $permision = $role::with('permision:id_permision')->get();


    Auth::user()->users_role->role_permision->id_permision;

    $Look=collect($Search = DB::select(
        DB::raw("select u.id
            from users u, users_role ur, role_permision rp
            where u.id=ur.id_users
            and ur.id_role=rp.id_role;")
    ))->pluck('id_permision');



    $my_id=collect($Search = DB::select(
        DB::raw("select rp.id_permision
            from users u, users_role ur, role_permision rp
            where u.id=ur.id_users
            and ur.id_role=rp.id_role;")
    ))->pluck('id_permision')->toArray();

    $id = Auth::id();

    if ($permision==2)
    {
        return redirect('/factura');
    }

    elseif ($permision==3)
    {
        return redirect('/pedidos1');
    }

    else
    {
        return redirect('/mi_cuenta');
    }
}

                        <a href="{{url('/factura')}}">FACTURA</a>

*/
