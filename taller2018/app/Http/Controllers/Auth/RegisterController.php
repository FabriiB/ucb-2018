<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firsname'  => 'required|alpha|min:1|max:50',
            'lastName1' => 'required|string|max:50',
            'lastName2' => 'string  |max:50',
            'address1'  => 'required|string|max:100',
            'address2'  => 'string  |max:100',
            'mobile'    => 'required|numeric|digits_between:60000000,79999999',
            'phone'     => 'numeric |digits_between:2000000,2999999',
            'email'     => 'required|string|email|max:50|unique:users',
            'password'  => 'required|string|min:6|max:30|confirmed',
            'birthDay'  => 'required|date|before:-18 years',
        ],[
            ''=>'',
            'firsname.alpha'        => 'Ingrese solo valores alfabeticos',
            'mobile.digits_between' => 'Ingrese un numero de celular valido',
            'phone.digits_between'  => 'Ingrese un numero fijo valido',
            'email.unique'          => 'El email ya esta en uso',
            'password.min'          => 'El password proporcionado debe ser mayor a 6 digitos',
            'password.confirmed'    => 'El password debe ser el mismo en ambos campos',
            'birthDay.before'       => 'La edad tiene que ser mayor a 18 años',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'firsname' => $data['firsname'],
            'lastName1' => $data['lastName1'],
            'lastName2' => $data['lastName2'],
            'address1' => $data['address1'],
            'address2' => $data['address2'],
            'mobile' => $data['mobile'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birthDay' => $data['birthDay'],
            'status' => 'active',
        ]);
    }
}
