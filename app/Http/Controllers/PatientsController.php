<?php

namespace App\Http\Controllers;


use App\Patient;
use App\Insurance;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PatientsController extends Controller
{

    public function patients(Request $request){
        $patients_data = DB::table('patients')
            ->join('insurances', 'patients.id', '=', 'insurances.id')
            ->join('types_of_insurance', 'types_of_insurance.id', '=', 'insurances.type_id')
            ->get();
        $insurances = DB::table('types_of_insurance')->get();
        $dates = array();
        for($i = 0; $i<=6; $i++){
            $dates[] = Carbon::now()->subDays($i);
        }
        return view('pages.patients',compact('patients_data','insurances','dates'));
    }

    public function store(Request $request){
    	$this->createNewUser($request);
        $this->createNewInsurance($request);
    	return redirect('/patients');
    }

    public function createNewUser(Request $request){
        $patient = new Patient();
        $patient->patient_name = $request->input('patient_name');
        $patient->reg_number =  $request->input('reg_number');
        $patient->save();
    }

    public function createNewInsurance(Request $request){
        $start = new Carbon($request->input('begin_date')); 
        $insurance = new Insurance();
        $insurance->type_id = 1;
        $insurance->is_active = true;
        $insurance->active_from = $request->input('begin_date');
        $insurance->active_to = $start->addDays(7);
        $insurance->save();
    }

    public function update(Request $request){
        $id = Patient::where('reg_number', $request->input('reg_number'))->value('id');
        $insurance = new Insurance();
        $insurance = Insurance::find($id);
        $insurance->type_id = $request->input('insurance_type');
        $insurance->active_from = Carbon::now();
        $insurance->active_to = Carbon::now()->addMonth();
        $insurance->save();
        return redirect('/patients');
    }

    public function show(Request $request, $patient){
        $role = $request->session()->get('role');
        $name = $request->session()->get('d_name');
        $patient_data = DB::table('patients')->where('patient_name',$patient)
            ->join('insurances', 'patients.id', 'insurances.id')
            ->join('types_of_insurance', 'insurances.type_id', 'types_of_insurance.id')
            ->select('patients.id','patient_name','reg_number','type','medical_certificate_id','psychological_certificate_id')
            ->get();
          
            if(is_null($patient_data[0]->medical_certificate_id)){
                $med_cert = false;
            }
            else $med_cert = DB::table('medical_certificates')
                ->where('patient_id', $patient_data[0]->id)->get();

            if(is_null($patient_data[0]->psychological_certificate_id)){
                $psy_cert = false;
            }
            else $psy_cert = DB::table('psychological_certificates')
                ->where('patient_id', $patient_data[0]->id)->get();
            
        return view('pages.patient',compact('patient_data','role','med_cert','psy_cert','name'));
    }
}
		