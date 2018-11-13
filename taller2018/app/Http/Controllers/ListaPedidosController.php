<?php

namespace App\Http\Controllers;

use App\ListadoPedidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListaPedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {

            /*
            $pedidos = DB::table('order')->select('idOrder', 'orderDate','status','id_person')->orderBy('idOrder')->paginate(10);
            return view('ListadoPedidos.index',["pedidos" => $pedidos],compact('pedidos'));
            */
            $pedidos = DB::table('order')
                ->select('order.idOrder', 'order.orderDate','order.status','order.id_person')
                ->join('person', 'person.id_person', '=', 'order.id_person')
                ->where('order.orderDate','=', '20060719')
                ->orderBy('idOrder')
                ->paginate(10);
            return view('ListadoPedidos.index',["pedidos" => $pedidos],compact('pedidos'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$pedidos=ListadoPedidos::find($id);
        return  view('pedido.show',compact('pedidos'));
        $pedidos = \Order::paginate(10);
        return view('ListadoPedidos.index');*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('ListadoPedidos.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
