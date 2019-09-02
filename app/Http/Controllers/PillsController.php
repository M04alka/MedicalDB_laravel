<?php

namespace App\Http\Controllers;

use App\Pill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HelpingFunctions;

class PillsController extends Controller
{

    //get pills page
    public function index(Request $request){
    	$error = false;
        $role = $request->session()->get('role');
    	$sales = DB::table('pills')
    	->join('types_of_pills', 'pills.type_of_pill_id', 'types_of_pills.id')
        ->join('doctors', 'pills.doctors_id', 'doctors.id')
        ->join('patients', 'pills.patient_id', 'patients.id')
        ->select('pills.id','patient_name','patients.reg_number','date', 'type','ammount','doctor_name')
    	->get();
    	$pills = DB::table('types_of_pills')->get();
    	return view('pages.pills',compact('sales','pills','error','role'));
    }

    //store sales o pills
    public function store(Request $request){
    	$insurance = DB::table('patients')
            ->join('insurances', 'patients.id', '=', 'insurances.id')
            ->join('types_of_insurance', 'types_of_insurance.id', '=', 'insurances.type_id')
            ->value('is_active');
    	if($request->input('count')>5){
    		$error = "Запрещенно продовать больше 5 таблеток пациенту!";
    		return redirect('/pills')->with('error');
    	}
    	elseif(!$insurance){
    		$error = "Запрещенно продовать таблетки пациенту с неактивой страховкой!";
    		return redirect('/pills')->with('error');
    	}
    	else{
    		$error = false;
    		$doctor = $request->session()->get('doctor_name');
    		$sale = new Pill();
        	$sale->patient_id = HelpingFunctions::getPatientsId($request->input('reg_number'));
        	$sale->date = Carbon::now();
        	$sale->type_of_pill_id = $request->input('type');
        	$sale->ammount = $request->input('count');
        	$sale->doctors_id = HelpingFunctions::getDoctorsId($doctor);
        	$sale->save();
        	return redirect('/pills')->with('error');;
    	}
    }
}
