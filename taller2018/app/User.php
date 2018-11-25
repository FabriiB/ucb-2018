<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'firs_name', 'last_name1', 'birth_day', 'email','status', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function ValidateUser()

    {
        $Cop = False;

        collect($Search = DB::select(
            DB::raw("select u.id 
            from users u, users_role ur, role_permision rp 
            where u.id=ur.id_users 
            and ur.id_role=rp.id_role
            and rp.id_permision=5;")
        ))->pluck('id')->toArray();


        $UserSession = isset(auth()->user()->id);

        if(in_array($UserSession, $Search))
        {
            $Cop = True;
        }

        return $Cop;

    }

}
