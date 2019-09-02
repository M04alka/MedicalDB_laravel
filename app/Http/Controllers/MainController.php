<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(Request $request){
        $role = $request->session()->get('role');
        $insurances = DB::table('types_of_insurance')->get();
        $pills = DB::table('types_of_pills')->get();
        return view('pages.main',compact('insurances','pills','main','role'));
    }
}
