<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SigninController extends Controller
{
    //get signin page
    public function index(){
        return view('pages.signinpage');
    }

    //registration
    public function store(Request $request){
        $doctor = new Doctor();
        $result = $doctor->registration(
            $request->input('doctor_name'),
            $request->input('password'),
            $request->input('reg_number')
        );
        if($result) return redirect('/login');
        else return back()->withError(["msg"=>"Пользователь с таким рег номером уже существует!"]);
    }
}
