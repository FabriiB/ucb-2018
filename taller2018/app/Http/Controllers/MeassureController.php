<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MeassureRequest;
use App\Meassure;

class MeassureController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request) {
            $query    = trim($request->get('searchText'));
            $meassure = DB::table('meassure')
                ->where('id_meassure', 'LIKE', '%' . $query . '%')
                ->orwhere('name', 'LIKE', '%' . $query . '%')
                ->orwhere('type', 'LIKE', '%' . $query . '%')
                ->orderBy('id_meassure', 'asc')
                ->paginate(5);
            return view('meassure.index', ["meassure" => $meassure, "searchText" => $query]);
        }
    }
    public function create()
    {
        return view('meassure.create');
    }
    public function store(MeassureRequest $request)
    {
        $tid = '27';
        $ip = $_SERVER['REMOTE_ADDR'];
        $tfecha = Carbon::now();
        $meassure       = new Meassure;
        $meassure->unit = $request->get('unit');
        $meassure->name = $request->get('name');
        $meassure->type = $request->get('type');
        /*$Recipe->transaction_id    = $tid;
        $Recipe->transaction_date  = $tfecha->format('Y-m-d H:i:s');
        $Recipe->transaction_host  = $ip;
        $Recipe->transaction_user  = $request->get('administrator');*/
        $meassure->save();
        return redirect()->action('MeassureController@index');
    }
    public function show($id)
    {
        return view("meassure.show", ["meassure" => Meassure::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("meassure.edit", ["meassure" => Meassure::findOrfail($id)]);
    }
    public function update(MeassureRequest $request, $id)
    {
        $meassure       = Meassure::findOrFail($id);
        $meassure->unit = $request->get('unit');
        $meassure->name = $request->get('name');
        $meassure->type = $request->get('type');
        $meassure->update();
        return redirect()->action('MeassureController@index');
    }
    public function destroy($id)
    {/*
        $meassure = Meassure::findOrfail($id);
        $meassure->delete();*/
        return redirect()->action('MeassureController@index');
    }
}
