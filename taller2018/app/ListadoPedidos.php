<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListadoPedidos extends Model
{
    public function index(Request $request)
    {

        return view('ListadoPedidos.index');
    }
}
