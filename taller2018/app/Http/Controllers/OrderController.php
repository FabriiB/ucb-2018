<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

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
        return view('order.index', ['order' => $order->toArray()]);


    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('order.create');

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        ///////////
        ///
        //PassportController.php
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
        $order= new \App\Order;
        $order->orderDate=$request->get('orderDate');
        $order->status=$request->get('status');
        $order->save();

        return redirect('order')->with('success', 'Information has been added');

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

        $order= \App\Order::find($idOrder);
        $order->orderDate=$request->get('orderDate');
        $order->status=$request->get('status');
        $order->save();
        return redirect('order');
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
        return redirect('order')->with('success','Information has been  deleted');

    }

}
