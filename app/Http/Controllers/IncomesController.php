<?php

namespace App\Http\Controllers;

use App\Income;
use Carbon\Carbon;
use App\Rules\SessionRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rules\IfInsuranceExistRule;
use App\Http\Controllers\HelpingFunctions;

class IncomesController extends Controller
{
   //get income page
   public function index(Request $request){
      if($request->session()->has('doctor_name')){
        $url = "incomes";
        $role = $request->session()->get('role');
        $incomes=DB::table('incomes')
        ->join('doctors', 'incomes.doctor_id', 'doctors.id')
        ->join('patients', 'incomes.patient_id', 'patients.id')
        ->select('incomes.id','patient_name','patients.reg_number','diagnosis','treatment','date','doctor_name')
        ->get();
        return view('pages.income',compact('incomes','role','url'));
      }
      else{
       return redirect('/login');
      }
   }

   //store new incomer
   public function store(Request $request){
      $request->validate([
          'reg_number'=>['required', new IfInsuranceExistRule],
          'diagnosis'=>'required',
          'treatment'=>'required',
      ]);
   		$doctor = $request->session()->get('doctor_name');
   		$income = new Income();
   		$income->patient_id = HelpingFunctions::getPatientsId($request->input('reg_number'));
   		$income->date = Carbon::now();
   		$income->diagnosis = $request->input('diagnosis');
   		$income->treatment = $request->input('treatment');
   		$income->doctor_id = HelpingFunctions::getDoctorsId($doctor);
   		$income->save();
   		return redirect('/income');
   }
}
