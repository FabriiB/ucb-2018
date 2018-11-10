<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use MaddHatter\LaravelFullcalendar\Event;

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
    protected $redirectTo = '/mi_cuenta';

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
            'firs_name' => 'required|string |min:1|max:50',
            'last_name1'=> 'required|string |max:50',
            /*'last_name2'=> 'string  |max:50',
            'address1'  => 'required|string |max:100',
            'address2'  => 'nullable|string |max:100',
            'mobile'    => 'required|numeric|min:60000000|max:79999999',
            'phone'     => 'nullable|numeric|min:2000000|max:2999999',*/
            'email'     => 'required|string |email|max:50|unique:users',
            'password'  => 'required|string |min:6|max:30|confirmed',
            'birth_day' => 'required|date   |before:-18 years',
            /*'photo'     => 'image   |nullable|max:1999',*/
        ],[
            ''=>'',
            /*'mobile.digits_between' => 'Ingrese un numero de celular valido',
            'phone.digits_between'  => 'Ingrese un numero fijo valido',*/
            'email.unique'          => 'El email ya esta en uso',
            'password.min'          => 'El password proporcionado debe ser mayor a 6 digitos',
            'password.confirmed'    => 'El password debe ser el mismo en ambos campos',
            'birth_day.before'      => 'La edad tiene que ser mayor a 18 años',

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

        /*$request = request();
        $profileImage = $request->file('photo');
        $profileImageSaveAsName = time() .
            $profileImage->getClientOriginalExtension();
        $upload_path = 'storage/';
        $profile_image_url =$profileImageSaveAsName;
        $success = $profileImage->move($upload_path, $profileImageSaveAsName);*/
        return User::create([
            'firs_name' => $data['firs_name'],
            'last_name1'=> $data['last_name1'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'birth_day' => $data['birth_day'],
            'status'    => 'active',
            /*'photo'     => $profile_image_url,*/
        ]);
    }

}
