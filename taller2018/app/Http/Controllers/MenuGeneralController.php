<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuGeneralController extends Controller
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
                ->orderBy('id_menu', 'desc')
                ->paginate(5);
            return view('menugeneral.index', ["menu" => $menu, "searchText" => $query]);
        }
    }
    public function historial($id)
    {
        return view('menugeneral.historial', ["menu"=>Menu::findOrFail($id)]);
    }
}
