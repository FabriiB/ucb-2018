<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\facturarequest;
use Illuminate\Support\Facades\DB;
use App\Bill;
use Carbon\Carbon;


class facturacontroller extends Controller
{
    public function index(Request $request)
    {
        $id=1;
        $name=DB::table('bill')
            ->join('payment', 'bill.id_payment','=','payment.idPayment')
            ->join('person', 'person.id_user','=','payment.idUser')
            ->select('person.firs_name as firs_name','person.last_name1 as last_name1', 'person.last_name2 as last_name2','person.nit as nit',
                'bill.control_code as control_code', 'bill.total_bill as total_bill', 'bill.description_bill as description_bill', 'bill.authorization_number as authorization_number','bill.identifier as identifier')
            ->where('bill.id_bill','=',$id)
            ->first();
        $now = Carbon::now();
        return view('Facturas.index',["datos"=>$name, "now"=>$now]);
    }

}
