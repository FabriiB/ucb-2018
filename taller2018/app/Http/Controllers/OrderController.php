<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDelivery;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {
        $order = order::all();
        $gold = order::select(array('order.*'))
            ->orderBy('order.id_person')
            ->join('person', function($join)
            {
                $join->on('person.id_person', '=', 'order.id_person');
            })
            ->get();
        return view('order.index',['order' => $order->toArray()]);

/* calendar
        $orders = [];
        $data = Order::all();
        if($data->count())
        {
            foreach ($data as $key => $value)
            {
                $orders[] = Calendar::event(
                    $value->status,
                    true,
                    new \DateTime($value->oderDate),
                    new \DateTime($value->orderDate.'+1 day'),
                    null,
                    // Add color
                    [
                        'color' => '#000000',
                        'textColor' => '#008000',
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($orders);
        return view('order.index', compact('calendar'));*/

    }



    public function create(Request $data)
    {
        $time = now();
        Order::create([
                    'orderDate'     => $time,
                    'cancelDate'    => null,
                    'status'        => 'En proceso',
                    'detalle'       => null,
                    'idPlan'        => $data['id_plan'],
                    'id_person'     => $data['id_person'],
                    'id_menu_dish'  => $data['id_menu_dish'],
                ]);


        $id = DB::table('order')
            ->where('orderDate','=',$time)
            ->where('id_person','=',$data['id_person'])
            ->select('idOrder')
            ->first()
            ->idOrder;

        $results = DB::select(DB::raw("SELECT to_char(DATE '".now()->format('Y-m-d')."', 'day')"));

        if($results[0]->to_char == 'monday'){
            OrderDelivery::create([
                'shippedDate'   => $time->addDay(3),
                'idOrder'       => $id,
                'status'        => 'En proceso',
                'idPlan'        => $data['id_plan'],
                'idDistributor' => 1,
            ]);
        }elseif ($results[0]->to_char == 'tuesday'){
            OrderDelivery::create([
                'shippedDate'   => $time->addDay(2),
                'idOrder'       => $id,
                'status'        => 'En proceso',
                'idPlan'        => $data['id_plan'],
                'idDistributor' => 1,
            ]);
        }elseif ($results[0]->to_char == 'wednesday'){
            OrderDelivery::create([
                'shippedDate'   => $time->addDay(1),
                'idOrder'       => $id,
                'status'        => 'En proceso',
                'idPlan'        => $data['id_plan'],
                'idDistributor' => 1,
            ]);
        }elseif ($results[0]->to_char == 'thursday'){
            OrderDelivery::create([
                'shippedDate'   => $time->addDay(4),
                'idOrder'       => $id,
                'status'        => 'En proceso',
                'idPlan'        => $data['id_plan'],
                'idDistributor' => 1,
            ]);
        }elseif ($results[0]->to_char == 'friday'){
            OrderDelivery::create([
                'shippedDate'   => $time->addDay(3),
                'idOrder'       => $id,
                'status'        => 'En proceso',
                'idPlan'        => $data['id_plan'],
                'idDistributor' => 1,
            ]);
        }elseif ($results[0]->to_char == 'saturday'){
            OrderDelivery::create([
                'shippedDate'   => $time->addDay(2),
                'idOrder'       => $id,
                'status'        => 'En proceso',
                'idPlan'        => $data['id_plan'],
                'idDistributor' => 1,
            ]);
        }elseif ($results[0]->to_char == 'sunday'){
            OrderDelivery::create([
                'shippedDate'   => $time->addDay(1),
                'idOrder'       => $id,
                'status'        => 'En proceso',
                'idPlan'        => $data['id_plan'],
                'idDistributor' => 1,
            ]);
        }

        return redirect()->route('mi_cuenta');
    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {
        DB::statement('ALTER TABLE "order" DISABLE TRIGGER ALL;');
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */

        if($request->hasfile('filename'))
        {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }

        $order= new Order();
        //$person= new \App\personu(); //Conect to person table(?)
        $order->orderDate=$request->get('orderDate');

        //$person-> id_person=$request->get ('\App\personu:find(1)->firs_name'); //Conect to person (?)

        $order->id_person=$request->get('id_person');
        $order->status=$request->get('status');
        $order->save();

        return redirect('order')->with('success', 'Information has been added');
        DB::statement('ALTER TABLE "order" ENABLE TRIGGER ALL;');

    }


    public function show(Order $order)

    {

        return view('order.show',compact('order'));

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function edit($idOrder)

    {

        $order = \App\Order::find($idOrder);
        return view('edit',compact('order','idOrder'));

        //return view('order.edit',compact('order'));

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request,$idOrder)

    {
        //

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idOrder
     * @return \Illuminate\Http\Response
     */

    public function destroy($idOrder)

    {

        $order = \App\Order::find($idOrder);
        $order->delete();
        return redirect('mi_cuenta');

    }



}
