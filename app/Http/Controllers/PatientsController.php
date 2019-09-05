<?php

namespace App\Http\Controllers;


use App\Patient;
use App\Insurance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Rules\PatientExistRule;
use App\Rules\IfInsuranceExistRule;
use Illuminate\Support\Facades\DB;


class PatientsController extends Controller
{
    //get patient page
    public function index(Request $request){
        if($request->session()->has('doctor_name')){
        $url = "patients";
        $role = $request->session()->get('role');
        $patients_data = DB::table('patients')
            ->join('insurances', 'patients.id', '=', 'insurances.id')
            ->join('types_of_insurance', 'types_of_insurance.id', '=', 'insurances.type_id')
            ->get();
        $insurances = DB::table('types_of_insurance')->get();
        //date of preferential insurance begin
        $dates = array();
        for($i = 0; $i<=6; $i++){
            $dates[] = Carbon::now()->subDays($i);
        }
        return view('pages.patients',compact('patients_data','insurances','dates','role','url'));}
         else{
       return redirect('/login');
      }
    }

    //store new patient 
    public function store(Request $request){
        $request->validate([
            'patient_name'=>'required',
            'reg_number'=>['required', new PatientExistRule],
            'begin_date'=>'required',
        ]);  
        $this->createNewPatient($request);
        $this->createNewInsurance($request);
        return redirect('/patients');
    }

    //create new patient 
    public function createNewPatient(Request $request){
        $patient = new Patient();
        $patient->patient_name = $request->input('patient_name');
        $patient->reg_number =  $request->input('reg_number');
        $patient->save();
    }

    //create insurance for patient 
    public function createNewInsurance(Request $request){
        $start = new Carbon($request->input('begin_date')); 
        $insurance = new Insurance();
        $insurance->type_id = 1;
        $insurance->is_active = true;
        $insurance->active_from = $request->input('begin_date');
        $insurance->active_to = $start->addDays(7);
        $insurance->save();
    }

    //update insurance
    public function update(Request $request){
        $request->validate([
            'reg_number'=>['required', new IfInsuranceExistRule],
            'insurance_type'=>'required',
        ]);  
        $id = Patient::where('reg_number', $request->input('reg_number'))->value('id');
        $insurance = new Insurance();
        $insurance = Insurance::find($id);
        $insurance->type_id = $request->input('insurance_type');
        $insurance->is_active = false;
        $insurance->active_from = Carbon::now();
        $insurance->active_to = Carbon::now()->addMonth();
        $insurance->save();
        return redirect('/patients');
    }
}
		