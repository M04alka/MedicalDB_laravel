<?php

namespace App\Http\Controllers;

use App\Pill;
use Carbon\Carbon;
use App\Rules\PillsCount;
use Illuminate\Http\Request;
use App\Rules\IfInsuranceExistRule;
use Illuminate\Support\Facades\DB;
use App\Rules\IsInsuranceActiveRule;
use App\Http\Controllers\HelpingFunctions;

class PillsController extends Controller
{
    //get pills page
    public function index(Request $request){
        if($request->session()->has('doctor_name')){
            $url = "pills";
        $role = $request->session()->get('role');
    	$sales = DB::table('pills')
    	->join('types_of_pills', 'pills.type_of_pill_id', 'types_of_pills.id')
        ->join('doctors', 'pills.doctors_id', 'doctors.id')
        ->join('patients', 'pills.patient_id', 'patients.id')
        ->select('pills.id','patient_name','patients.reg_number','date', 'type','ammount','doctor_name')
    	->get();
    	$pills = DB::table('types_of_pills')->get();
    	return view('pages.pills',compact('sales','pills','role','url'));
    }
    else{
       return redirect('/login');
      }
    }

    //store sales of pills
    public function store(Request $request){
        $request->validate([
            'reg_number'=>['required', new IfInsuranceExistRule, new IsInsuranceActiveRule],
            'count'=>['required', new PillsCount],
            'type'=>'required',
        ]);
    	$doctor = $request->session()->get('doctor_name');
    	$sale = new Pill();
        $sale->patient_id = HelpingFunctions::getPatientsId($request->input('reg_number'));
        $sale->date = Carbon::now();
        $sale->type_of_pill_id = $request->input('type');
        $sale->ammount = $request->input('count');
        $sale->doctors_id = HelpingFunctions::getDoctorsId($doctor);
        $sale->save();
        return redirect('/pills');
    }  
}
