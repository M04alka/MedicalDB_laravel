<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkersController extends Controller
{
    //list of medical workers
    public function index(Request $request){
        $role = $request->session()->get('role');
        $workers = DB::table('doctors')->where('is_fired',false)->where('is_active',true)
                   ->join('roles','doctors.role_id','=','roles.id')
                   ->get();
        $roles = DB::table('roles')->get();
        return view('pages.workers',compact('workers','role','roles'));
    }

    //fire worker
    public function fire($reg_number){
        $fire = DB::table('doctors')->where('reg_number',$reg_number)->update(['is_fired' => true]);
        return redirect('/workers');
    }
}
