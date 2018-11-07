<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\facturarequest;
use App\facturamodel;
use Illuminate\Support\Facades\DB;
use App\User;


class facturacontroller extends Controller
{
    public function index(Request $request)
    {
        $id=6140974;
        $name=DB::table('users')
            ->select('firs_name','last_name1', 'last_name2','id')
            ->where('id','=',$id)
            ->first();
        return view('Facturas.index',["datos"=>$name]);
    }
}
