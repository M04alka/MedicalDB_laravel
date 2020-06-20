<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\InsuranceService;
use App\Models\Services\PatientService;
use App\Models\Services\PillService;
use App\Models\Services\DoctorService;

class PatientController extends Controller
{
    //get patients page
    public function index(Request $request){
    	$insurance = new InsuranceService();
    	$patient = new PatientService();
    	$insurances = $insurance->getInsurances();
    	$patientsData = $patient->getListOfPatients();
        $permissions = $patient->getPermissions($request->session()->get('role'));
        return view('pages.patients',compact('patientsData','insurances','permissions'));
    }

    //add patient
    public function store(Request $request){
    	$patient = new PatientService();
    	$patient->createNewPatient(
            strval($request->input('patient_name')), 
            strval($request->input('reg_number')), 
            false
        );
        return redirect('/patients');
    }

    //updating user insurance
    public function update(Request $request){
        $patient = new PatientService();
        $patietnId = $patient->getPatientsIdByRegNumber($request->input('reg_number'));
        $update = $patient->updateInsurance($patietnId, $request->input('insurance_type'));
        return redirect('/patients');
    }

    //activate user insurance
    public function activateInsurance(Request $request, $regNumber){
        $patient = new PatientService();
        $patientId = $patient->activatePatientInsurance($regNumber);
        return redirect('/patients');
    }
    
}
