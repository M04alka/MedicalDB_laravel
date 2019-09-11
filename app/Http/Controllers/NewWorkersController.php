<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HelpingFunctions;

class NewWorkersController extends Controller
{
    //list of new users
    public function index(Request $request){
        if(HelpingFunctions::checkSession($request)){
            $url = "new";
            $role = $request->session()->get('role');
            $new = DB::table('doctors')->where('is_active',false)->select('doctor_name','reg_number')->get();
            $roles = DB::table('roles')->get();
            return view('pages.new',compact('new','role','roles','url'));
        }
        else return redirect('/login');
    }

    //hire new user
    public function update(Request $request){
       $take = DB::table('doctors')->where('reg_number',$request->input('reg_number'))->update(['is_active' => true]);
       return redirect('/new');
    }
        
    
    //delete user
    public function delete(Request $request){
        $delete = DB::table('doctors')->where('reg_number',$request->input('reg_number'))->delete();
        return redirect('/new');  
    }
}
