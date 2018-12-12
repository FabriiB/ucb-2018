<?php

namespace App\Http\Controllers;

use App\Http\Requests\StepsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MenuRequest;
use App\Steps;

class StepsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request) {
            $query    = trim($request->get('searchText'));
            $menu = DB::table('steps')
                ->where('id_step', 'LIKE', '%' . $query . '%')
                ->orwhere('title', 'LIKE', '%' . $query . '%')
                ->orwhere('status', 'LIKE', '%' . $query . '%')
                ->orderBy('id_step', 'desc')
                ->paginate(5);
            return view('steps.index', ["steps" => $menu, "searchText" => $query]);
        }
    }
    public function create()
    {
        return view('steps.create');
    }
    public function store(StepsRequest $request)
    {
        $tid = '27';
        $ip = $_SERVER['REMOTE_ADDR'];
        $tfecha = Carbon::now();
        $menu       = new Steps;
        $menu->title = $request->get('title');
        $menu->description = $request->get('description');
        $menu->date_created = $tfecha->format('Y-m-d H:i:s');
        $menu->status = 'activo';
        /*$Recipe->transaction_id    = $tid;
        $Recipe->transaction_date  = $tfecha->format('Y-m-d H:i:s');
        $Recipe->transaction_host  = $ip;
        $Recipe->transaction_user  = $request->get('administrator');*/
        $menu->save();

        return redirect()->action('StepsController@index');
    }
    public function show($id)
    {
        return view("steps.show", ["steps" => Steps::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("steps.edit", ["steps" => Steps::findOrfail($id)]);
    }
    public function update(StepsRequest $request, $id)
    {
        $step       = Steps::findOrFail($id);
        $step->title = $request->get('title');
        $step->description = $request->get('description');
        $step->update();
        return redirect()->action('StepsController@index');
    }
    public function cambiar($id)
    {
        $ingredients       = Steps::findOrFail($id);
        if($ingredients->status == 'activo')
        {
            $ingredients->status = 'no actvo';
        }
        else
        {
            $ingredients->status = 'activo';
        }
        $ingredients->update();
        return redirect()->action('StepsController@index');
    }
}
