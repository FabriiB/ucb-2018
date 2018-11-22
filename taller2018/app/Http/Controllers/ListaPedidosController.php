<?php

namespace App\Http\Controllers;

use App\ListadoPedidos;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PedidoRequest;


class ListaPedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fechainicial = null;
        $fechafinal = null;
        if ($request) {

            /*
            $pedidos = DB::table('order')->select('idOrder', 'orderDate','status','id_person')->orderBy('idOrder')->paginate(10);
            return view('ListadoPedidos.index',["pedidos" => $pedidos],compact('pedidos'));
            */
            $pedidos = DB::table('order')
                ->select('order.idOrder', 'order.orderDate','order.status','person.firs_name','person.last_name1','person.last_name2')
                ->join('person', 'person.id_person', '=', 'order.id_person')
                ->where('order.orderDate','>', '19900101')//$fechainicial
                ->where('order.orderDate','<', '20200529')//$fechafinal
                ->orderBy('idOrder')
                ->paginate(5);
            return view('ListadoPedidos.index',["pedidos" => $pedidos],compact('pedidos'));
        }
        /*Filtro por estado
         * $pedidos = DB::table('order')
                ->select('order.idOrder', 'order.orderDate','order.status','person.firs_name','person.last_name1','person.last_name2')
                ->join('person', 'person.id_person', '=', 'order.id_person')
                ->where('order.status','=', 'En proceso')
                ->orderBy('idOrder')
                ->paginate(5);
            return view('ListadoPedidos.index',["pedidos" => $pedidos],compact('pedidos'));
         */
        /*Filtro por cliente
         * $pedidos = DB::table('order')
                ->select('order.idOrder', 'order.orderDate','order.status','person.firs_name','person.last_name1','person.last_name2')
                ->join('person', 'person.id_person', '=', 'order.id_person')
                ->where('person.id_person','=', '50')
                ->orderBy('idOrder')
                ->paginate(5);
            return view('ListadoPedidos.index',["pedidos" => $pedidos],compact('pedidos'));
         */

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
        return view("ListadoPedidos.edit", ["pedido" => Order::findOrfail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(PedidoRequest $request, $id)
    {
        $pedido = Order::findOrFail($id);
        $pedido->status = $request->get('status');
        $pedido->detalle = $request->get('detalle');
        $pedido->update();
        return redirect()->action('MeassureController@index');
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
    public function filtro(Request $request){
        $fechainicial = null;
        $fechafinal = null;
        if ($request) {

            /*
            $pedidos = DB::table('order')->select('idOrder', 'orderDate','status','id_person')->orderBy('idOrder')->paginate(10);
            return view('ListadoPedidos.index',["pedidos" => $pedidos],compact('pedidos'));
            */
            $pedidos = DB::table('order')
                ->select('order.idOrder', 'order.orderDate','order.status','person.firs_name','person.last_name1','person.last_name2')
                ->join('person', 'person.id_person', '=', 'order.id_person')
                ->where('order.orderDate','>', '20060719')//$fechainicial
                ->where('order.orderDate','<', '20200529')//$fechafinal
                ->orderBy('idOrder')
                ->paginate(5);
            return view('ListadoPedidos.index',["pedidos" => $pedidos],compact('pedidos'));
        }

    }
}
