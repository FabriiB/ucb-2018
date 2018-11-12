<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstructionsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request) {
            $query    = trim($request->get('searchText'));
            $instructions = DB::table('instructions')
                ->where('id_instruction', 'LIKE', '%' . $query . '%')
                ->orwhere('time', 'LIKE', '%' . $query . '%')
                ->orwhere('date_created', 'LIKE', '%' . $query . '%')
                ->orwhere('type', 'LIKE', '%' . $query . '%')
                ->orwhere('id_step', 'LIKE', '%' . $query . '%')
                ->orwhere('id_dish', 'LIKE', '%' . $query . '%')
                ->orderBy('id_instruction', 'asc')
                ->paginate(5);
            //return view('Recipe.index',compact('recipe'), ["searchText" => $query]);
            return view('instructions.index', ["instructions" => $instructions, "searchText" => $query]);
        }
    }
}
