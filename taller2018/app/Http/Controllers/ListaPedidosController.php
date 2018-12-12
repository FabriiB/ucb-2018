<?php

namespace App\Http\Controllers;

use App\ListadoPedidos;
use App\Order;
use App\Person;
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

          $orders = Order::name($request->get('firs_name'),$request->get('status'),$request->get('fechaini'),$request->get('fechafin'))
       // $orders = Order::name($request->get('firs_name'),$request->get('status'))
//        $orders = Order::name($request->get('fechaini'),$request->get('fechafin'))
                ->select('order.idOrder', 'order.orderDate','order.status','person.firs_name','person.last_name1','person.last_name2')
                ->join('person', 'person.id_person', '=', 'order.id_person')
                ->orderBy('idOrder')
                ->paginate(10);
            return view('ListadoPedidos.index',compact('orders'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $person = DB::table('person')
            ->select('id_person', 'firs_name')
            -> get();
        return view('pedidos.create', ["person" => Person::findOrFail($id), "person" =>$person]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('ListadoPedidos.filtro');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('ListadoPedidos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view("ListadoPedidos.edit",compact( 'order'));
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
//        $request->validate([
//            'orderDate' => 'required',
//            'status'=> 'required',
//            'detalle'=> 'required',
//            'cancelDate'=> 'required',
//            'idPlan'=> 'required',
//            'id_person'=> 'required',
//            'id_menu_dish'=> 'required',
//            'transaction_id'=> 'required',
//            'transaction_date'=> 'required',
//            'transaction_host'=> 'required',
//            'transaction_user'=> 'required',
//        ]);
        $order = Order::find($id);
        $order -> update($request->all());
        $orders = Order::
        select('order.idOrder', 'order.orderDate','order.status','person.firs_name','person.last_name1','person.last_name2')
            ->join('person', 'person.id_person', '=', 'order.id_person')
            ->where('order.orderDate','>', '19800101')//$fechainicial
            ->where('order.orderDate','<', '20500529')//$fechafinal
            ->orderBy('idOrder')
            ->paginate(5);
        return view('ListadoPedidos.index',compact('orders'));
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
//        $fechainicial = null;
//        $fechafinal = null;
//        if ($request) {
//
//            /*
//            $pedidos = DB::table('order')->select('idOrder', 'orderDate','status','id_person')->orderBy('idOrder')->paginate(10);
//            return view('ListadoPedidos.index',["pedidos" => $pedidos],compact('pedidos'));
//            */
//            $pedidos = DB::table('order')
//                ->select('order.idOrder', 'order.orderDate','order.status','person.firs_name','person.last_name1','person.last_name2')
//                ->join('person', 'person.id_person', '=', 'order.id_person')
//                ->where('order.orderDate','>', '20060719')//$fechainicial
//                ->where('order.orderDate','<', '20200529')//$fechafinal
//                ->orderBy('idOrder')
//                ->paginate(5);
//            return view('ListadoPedidos.index',["pedidos" => $pedidos],compact('pedidos'));
//        }
        return view('ListadoPedidos.filtro');

    }
    public  function filtroFecha(Request $data){
        $fechainicial = $data['dateini'];
        $fechafinal = $data['datefin'];
        dd($data['datefin']);
        if ($data) {

            $pedidos = DB::table('order')
                ->select('order.idOrder', 'order.orderDate','order.status','person.firs_name','person.last_name1','person.last_name2')
                ->join('person', 'person.id_person', '=', 'order.id_person')
                ->where('order.orderDate','>', $fechainicial)//$fechainicial
                ->where('order.orderDate','<', '20200529')//$fechafinal
                ->orderBy('idOrder')
                ->paginate(5);
            //return view('ListadoPedidos.index',["pedidos" => $pedidos],compact('pedidos'));
            return 'Hola';
        }

    }
//    public  function filtroNombre(Request $data){
//        return
//
//    }
//
//    public  function filtroEstado(Request $data){
//        return
//
//    }


}
