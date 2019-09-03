<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //get login page
    public function index(Request $request){
        //$request->session()->flush();
        return view('pages.loginpage');
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
