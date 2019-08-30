<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function create(){
        $error = false;
        return view('pages.signinpage',compact('error'));
    }

    public function login(){
        $error = false;
        return view('pages.loginpage',compact('error'));
    }

    public function store(Request $request){

        $this->validate($request,['d_name'=>'required','password'=>'required','reg_number'=>'required']);  
        $user1 = User::where('reg_number',$request->input('reg_number'))->get();
        if($user1->isEmpty()){
            $user = new User();
            $user->d_name = $request->input('d_name');
            $user->password = $request->input('password');
            $user->reg_number = $request->input('reg_number');
            $user->save();
            return redirect('/login');
        }
        else {
            $error = "Внимание! Сотрудник с таким регистрационным номером уже существует!";
            return view('pages.signinpage',compact('error'));
        }
    }

    public function logon(Request $request){  
        
        $this->validate($request,['d_name'=>'required','password'=>'required']);     
        $user = Db::table('users')->whereRaw('d_name = ? and password = ?', array(request('d_name'),request('password')))
        ->join('roles', 'roles.id', '=', 'users.role_id')
        ->get();
        if($user->isEmpty()){
            $error = "Пользователь с таким имененм и паролем не найден!";
            return view('pages.loginpage',compact('error'));
        }
        elseif(!$user->isEmpty() && $user[0]->is_active!=true){
            $error = "Ожидайте подтверждения акаунат!"; 
            return view('pages.loginpage',compact('error'));
        }
        else{ 
            $request->session()->put('role',$user[0]->role);
            $request->session()->put('d_name', $user[0]->d_name);
            $username = $request->input('d_name');
            $url = str_replace(' ', '', $username);
            return redirect('/patients');
        } 
    }

    public function index(){
        $workers = DB::table('users')
                   ->join('roles','users.role_id','=','roles.id')
                   ->get();
                   foreach ($workers as $worker) {
                      //dd($worker->role);
                   }
                  
        return view('pages.workers',compact('workers'));
    }

    public function new(){
        $new = DB::table('users')
      //->where('is_active',false)
        ->select('d_name')
        ->get();
        return view('pages.new',compact('new'));
    }
}
