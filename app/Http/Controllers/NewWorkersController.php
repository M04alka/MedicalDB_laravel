<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewWorkersController extends Controller
{
    //list of new users
    public function index(Request $request){
        $role = $request->session()->get('role');
        $new = DB::table('doctors')->where('is_active',false)->select('doctor_name','reg_number')->get();
        return view('pages.new',compact('new','role'));
    }

    //hire new worker
    public function update(Request $request){
        if($request->input('delete')){
            $delete = DB::table('doctors')->where('reg_number',$request->input('reg_number'))->delete();
            return redirect('/new');
        }
        elseif($request->input('hire')) {
            $take = DB::table('doctors')->where('reg_number',$request->input('reg_number'))->update(['is_active' => true]);
            return redirect('/new');
        }
        
    }
}
