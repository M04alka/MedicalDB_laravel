<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiredController extends Controller
{
    //list of fired workers
    public function index(Request $request){
        $role = $request->session()->get('role');
        $fired = DB::table('doctors')->where('is_fired',true)->select('doctor_name','reg_number')->get();
        return view('pages.fired',compact('fired','role'));
    }

    //restore fired worker
    public function restore($reg_number){
        $restore = DB::table('doctors')->where('reg_number',$reg_number)->update(['is_fired' => false]);
        return redirect('/fired');
    }
}
