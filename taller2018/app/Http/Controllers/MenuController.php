<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Provider\DateTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Redirect;
use App\Http\Requests\MenuRequest;
use Illuminate\Routing\Redirector;
use App\Menu;
use App\MenuDish;

class MenuController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request) {
            $query    = trim($request->get('searchText'));
            $menu = DB::table('menu')
                ->where('id_menu', 'LIKE', '%' . $query . '%')
                ->orwhere('name', 'LIKE', '%' . $query . '%')
                ->orwhere('status', 'LIKE', '%' . $query . '%')
                ->orwhere('date_created', 'LIKE', '%' . $query . '%')
                ->orwhere('date_end', 'LIKE', '%' . $query . '%')
                ->orwhere('id_user', 'LIKE', '%' . $query . '%')
                ->orderBy('id_menu', 'asc')
                ->paginate(5);
            //return view('Recipe.index',compact('recipe'), ["searchText" => $query]);
            return view('menu.index', ["menu" => $menu, "searchText" => $query]);
        }
    }

    public function create()
    {
        $id_ad = DB::table('administrator')
            ->select('id_administrator', 'name')
            ->get();
        return view('menu.create', ['id_ad' => $id_ad]);
    }
}
