<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //get login page
    public function index(){
        return view('pages.loginpage');
    }

    //registration
    public function store(Request $request){
        //$this->validate($request,['doctor_name'=>'required','password'=>'required','reg_number'=>'required|max:5']);  
        $user = DB::table('doctors')->where('reg_number',$request->input('reg_number'))->first();
        if(is_null($user)){
            $doctor = new Doctor();
            $doctor->doctor_name = $request->input('doctor_name');
            $doctor->password = $request->input('password');
            $doctor->reg_number = $request->input('reg_number');
            $doctor->save();
            return redirect('/login');
        }
        else {
            return redirect('/signin');
        }
    }
}
