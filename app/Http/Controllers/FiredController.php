<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FiredController extends Controller
{
    //list of fired workers
    public function index(Request $request){
        $url = "fired";
        $role = $request->session()->get('role');
        $fired = DB::table('doctors')->where('is_fired',true)->select('doctor_name','reg_number')->get();
        return view('pages.fired',compact('fired','role','url'));
    }

    //restore fired worker
    public function update(Request $request){
        $restore = DB::table('doctors')->where('reg_number',$request->input('reg_number'))->update(['is_fired' => false]);
        return redirect('/fired');
    }
}
