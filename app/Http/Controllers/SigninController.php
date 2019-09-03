<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SigninController extends Controller
{
    //get signin page
    public function index(){
        return view('pages.signinpage',compact('error'));
    }

    //registration
    public function store(Request $request){
        $this->validate($request,['doctor_name'=>'required','password'=>'required','reg_number'=>'required|max:5']);  
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
