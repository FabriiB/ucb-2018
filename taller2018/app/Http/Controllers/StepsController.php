<?php

namespace App\Http\Controllers;

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
        return view('menu.create');
    }
    public function store(MenuRequest $request)
    {
        $tid = '27';
        $ip = $_SERVER['REMOTE_ADDR'];
        $tfecha = Carbon::now();
        $menu       = new Menu;
        $menu->name = $request->get('name');
        $menu->date_created = $request->get('date_created');
        $menu->date_end = $request->get('date_end');
        $menu->status = 'activo';
        $menu->id_user = '1';
        /*$Recipe->transaction_id    = $tid;
        $Recipe->transaction_date  = $tfecha->format('Y-m-d H:i:s');
        $Recipe->transaction_host  = $ip;
        $Recipe->transaction_user  = $request->get('administrator');*/
        $menu->save();

        return redirect()->action('MenuController@index');
    }
}
