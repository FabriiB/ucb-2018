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
        $id=6140974;
        $name=DB::table('users')
            ->join('bill', 'users.id','=','bill.idUser')
            ->select('users.firs_name as firs_name','users.last_name1 as last_name1', 'users.last_name2 as last_name2','users.id as id', 'bill.control_code as control_code', 'bill.total_bill as total_bill', 'bill.description_bill as description_bill', 'bill.authorization_number as authorization_number','bill.identifier as identifier')
            ->where('users.id','=',$id)
            ->orWhere('bill.idUser','=',$id)
            ->first();
        $now = Carbon::now();
        return view('Facturas.index',["datos"=>$name, "now"=>$now]);
    }

}
