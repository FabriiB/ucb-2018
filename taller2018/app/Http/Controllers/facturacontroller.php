<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\facturarequest;
use App\facturamodel;

class facturacontroller extends Controller
{
    public function index(Request $request)
    {
        return view('Facturas.index');
    }
}
