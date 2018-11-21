<?php

namespace App\Http\Controllers;

use App\Person;
use App\UserPlan;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PersonController extends Controller
{

    protected $redirectTo = '/mi_cuenta';

    protected function create(Request $data)
    {
        $id = Auth::id();
        try {
            $person = DB::table('person')
                ->select('id_person')
                ->where('id_user','=',$id)
                ->first()
                ->id_person;
        }
        catch (\Exception $e) {
            $person=null;
        }
        if($person !== null){
            Payment::create([
                'idUser'    => $person,
                'idPlan'    => $data['id_plan'],
                'date'      => now(),
                'status'    => 'activo',
                'platform'  => $data['platform'],

            ]);
        }else{
            $validate = $this->validate($data,[
                'firs_name' => 'required|string |min:1|max:50',
                'last_name1'=> 'required|string |max:50',
                'last_name2'=> 'string  |max:50',
                'address1'  => 'required|string |max:100',
                'address2'  => 'nullable|string |max:100',
                'mobile'    => 'required|numeric|min:10000000|max:99999999',
                'phone'     => 'nullable|numeric|min:1000000|max:9999999',
                'birthDay'  => 'required|date   |before:-18 years',
                'country'   => 'required|string |max:50',
                'city'      => 'required|string |max:50',
                'nit'       => 'required|numeric',
                'id_user'   => 'required|unique:person',
            ],
                [
                    ''=>'',
                    'birth_day.before'  => 'La edad tiene que ser mayor a 18 años',
                    'id_user.unique'    => 'El usuario ya tiene datos de factura',
                ]);

            Person::create([
                'firs_name' => $data['firs_name'],
                'last_name1'=> $data['last_name1'],
                'last_name2'=> $data['last_name2'],
                'address1'  => $data['address1'],
                'address2'  => $data['address2'],
                'mobile'    => $data['mobile'],
                'phone'     => $data['phone'],
                'birthDay'  => $data['birthDay'],
                'country'   => $data['country'],
                'city'      => $data['city'],
                'nit'       => $data['nit'],
                'dishes'    => '30',
                'id_user'   => $data['id_user'],
            ]);
        }

        /*$request = request();
        $profileImage = $request->file('photo');
        $profileImageSaveAsName = time() .
            $profileImage->getClientOriginalExtension();
        $upload_path = 'storage/';
        $profile_image_url =$profileImageSaveAsName;
        $success = $profileImage->move($upload_path, $profileImageSaveAsName);*/

        return redirect()->action(
            'PersonController@createNext', [$data['id_plan']]
        );
    }

    protected function createNext($data)
    {
        $id = Auth::id();
        $person = DB::table('person')
            ->select('id_person')
            ->where('id_user','=',$id)
            ->first()
            ->id_person;
        UserPlan::create([
            'id_person'         => $person,
            'id_plan'           => $data,
            'start_date_plan'   => now(),
            'ending_date_plan'  => now()->addMonth(1),

        ]);


        return redirect()->route('mi_cuenta');
    }
}
