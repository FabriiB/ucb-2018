<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plan = DB::table('user_plan')
            ->where('start_date_plan', '<=', now())
            ->where('ending_date_plan', '>=',now())
            ->get();
        $id = Auth::id();
        $user = User::findOrFail($id);
        $order_table = DB::table('order')
            ->select('orderDate', 'status')
            ->get();
        return view('home.home',compact('user', 'order_table'));
    }

    public function edit()
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        return view('home.edit',compact('user'));
    }

    public function factura()
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        return view('home.factura',compact('user'));
    }

    public function historial()
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        return view('home.historial',compact('user'));
    }

    public function historial2()
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        return view('home.historial2',compact('user'));
    }
}
