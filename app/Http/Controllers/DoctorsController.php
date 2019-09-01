<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorsController extends Controller
{

    //get signin page
    public function signin(){
        return view('pages.signinpage',compact('error'));
    }

    //get login page
    public function login(){
        return view('pages.loginpage',compact('error'));
    }

    //registration
    public function store(Request $request){
        //$this->validate($request,['doctor_name'=>'required','password'=>'required','reg_number'=>'required|max:5']);  
        $user = DB::table('doctors')->where('reg_number',$request->input('reg_number'))->first();
        if($user->isEmpty()){
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

    //authentication
    public function logon(Request $request){  
        $doctor = DB::table('doctors')
        ->where('doctor_name',$request->input('doctor_name'))
        ->where('password',$request->input('password'))
        ->join('roles','doctors.role_id','roles.id')
        ->first();

        if(is_null($doctor)){
            return redirect('/login');
        }
        elseif(!is_null($doctor) && $doctor->is_active!=true){ 
            return redirect('/login')->with('$error');
        }
        else{ 
            $request->session()->put('role',$doctor->role);
            $request->session()->put('doctor_name', $doctor->doctor_name);
            return redirect('/main');
        } 
    }

    //list of medical workers
    public function workers(){
        $workers = DB::table('doctors')
                   ->join('roles','doctors.role_id','=','roles.id')
                   ->get();
        return view('pages.workers',compact('workers'));
    }

    //list of new users
    public function new(){
        $new = DB::table('doctors')->where('is_active',false)->select('doctor_name')->get();
        return view('pages.new',compact('new'));
    }

    //delete unwanted user
    public function delete($reg_number){
        $delete = DB::table('doctors')->where('reg_number',$reg_number)->delete();
        return redirect('/new');
    }

    //hire new worker
    public function take($reg_number){
        $take = DB::table('doctors')->where('reg_number',$reg_number)->update(['is_active' => true]);
        return redirect('/new');
    }

    //fire worker
    public function fire($reg_number){
        $fire = DB::table('doctors')->where('reg_number',$reg_number)->update(['is_fired' => true]);
        return redirect('/workers');
    }

    //list of fired workers
    public function fired(){
        $fired = DB::table('doctors')->where('is_fired',true)->select('doctor_name')->get();
        return view('pages.fired',compact('fired'));
    }

    //restore fired worker
    public function restore($reg_number){
        $restore = DB::table('doctors')->where('reg_number',$reg_number)->update(['is_fired' => false]);
        return redirect('/fired');
    }

    public function main(){
        $insurances = DB::table('types_of_insurance')->get();
        $pills = DB::table('types_of_pills')->get();
        return view('pages.main',compact('insurances','pills'));
    }
}
