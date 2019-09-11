<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HelpingFunctions;

class WorkersController extends Controller
{
    //list of medical workers
    public function index(Request $request){
        if(HelpingFunctions::checkSession($request)){
        $url = "workers";
        $role = $request->session()->get('role');
        $workers = DB::table('doctors')->where('is_fired',false)->where('is_active',true)
                   ->join('roles','doctors.role_id','=','roles.id')
                   ->get();
        $roles = DB::table('roles')->get();
        return view('pages.workers',compact('workers','role','roles','url'));
    }
        else return redirect('/login');
    }

    //fire worker
    public function update(Request $request){
        if($request->input('assigne')){
            $assigne = DB::table('doctors')->where('reg_number',$request->input('reg_number'))->update(['role_id' => $request->input('role')]);
            return redirect('/workers');
        }
        elseif($request->input('fire')){
            $fire = DB::table('doctors')->where('reg_number',$request->input('reg_number'))->update(['is_fired' => true]);
            return redirect('/workers');
        }
        
    }
}
