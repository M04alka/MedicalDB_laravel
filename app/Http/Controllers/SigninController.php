<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SigninController extends Controller
{
    //get signin page
    public function index(){
        return view('pages.signinpage',compact('error'));
    }

    //authentication
    public function store(Request $request){  
        $doctor = DB::table('doctors')
        ->where('doctor_name',$request->input('doctor_name'))
        ->where('password',$request->input('password'))
        ->join('roles','doctors.role_id','roles.id')
        ->first();

        if(is_null($doctor)){
            return redirect('/login');
        }
        elseif(!is_null($doctor) && $doctor->is_active!=true){ 
            return redirect('/login');
        }
        else{ 

            $request->session()->put('role',$doctor->role);
            $request->session()->put('doctor_name',$doctor->doctor_name);
            return redirect('/main');
        } 
    }
}
