<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\facturarequest;
use App\facturamodel;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;


class facturacontroller extends Controller
{
    public function index(Request $request)
    {
        $id=1;
        $name=DB::table('person')
            ->join('payment', 'id_user','=','payment.idUser')
            ->join('bill', 'idPayment','=','bill.id_payment')
            ->select('person.firs_name as firs_name','person.last_name1 as last_name1', 'person.last_name2 as last_name2','person.id_person as id_person',
                'bill.control_code as control_code', 'bill.total_bill as total_bill', 'bill.description_bill as description_bill', 'bill.authorization_number as authorization_number','bill.identifier as identifier')
            ->where('bill.id_payment','=',$id)
            ->orWhere('payment.idUser','=',$id)
            ->first();
        $now = Carbon::now();
        return view('Facturas.index',["datos"=>$name, "now"=>$now]);
    }

}
