<?php

namespace App\Http\Controllers;

use App\Models\Services\DoctorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //get login page
    public function index(Request $request){
        $request->session()->forget(['doctor_name','role']);
        return view('pages.loginpage');
    }

    //authentication
    public function store(Request $request){
        $doctor = new DoctorService();
        $result = $doctor->authorization($request->input('doctor_name'), $request->input('password'));
        if(empty($result)){
            return back()->withErrors(["error_msg" => "Пользователь с таким именем не найден!"]);
        }
        elseif(!empty($result) && $result->is_active!=true){ 
            return back()->withErrors(["error_msg" => "Ваш аккаунт еще не активирован. Ожидайте!"]);
        }
        else{ 
            $request->session()->put('role',$result->role_name);
            $request->session()->put('doctor_name',$result->doctor_name);
            return redirect('/info'); 
        }   
    }
}
