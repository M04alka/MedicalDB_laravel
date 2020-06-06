<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\InsuranceService;
use App\Models\Services\PatientService;
use App\Models\Services\PillService;
use App\Models\Services\DoctorService;

class PatientController extends Controller
{

    //method for /patients page
    public function index(Request $request){
    	$insurance = new InsuranceService();
    	$patient = new PatientService();
    	$insurances = $insurance->getInsurances();
    	$patientsData = $patient->getPatientsList();
        $permissions = $patient->getPatientsPagePermissions($request->session()->get('role'));
        return view('pages.patients',compact('patientsData','insurances','permissions'));
    }

    //method for adding new patient
    public function store(Request $request){
    	$patient = new PatientService();
    	$patient->registerNewPatient(
            strval($request->input('patient_name')), 
            strval($request->input('reg_number')), 
            false
        );
        return redirect('/patients');
    }

    //method for updating insurance
    public function update(Request $request){
        $patient = new PatientService();
        $patietnId = $patient->getPatientsIdByRegNumber($request->input('reg_number'));
        $update = $patient->updateInsurance($patietnId, $request->input('insurance_type'));
        return redirect('/patients');
    }

    //active user insurance
    public function activateInsurance(Request $request, $regNumber){
        $patient = new PatientService();
        $patientId = $patient->activatePatientInsurance($regNumber);
        return redirect('/patients');
    }

    //method for /patient page
    public function show(Request $request, $regNumber){
        $patient = new PatientService();
        $role = $request->session()->get('role');
        $permissions = $patient->getPatientPagePermissions($request->session()->get('role'));
        $patientData = $patient->getPatientInsurance($regNumber);
        $medCertificate = $patient->getMedSertificate($patientData->medical_certificate_id, $patientData->id);
        $psyCertificate = $patient->getPsySertificate($patientData->psychological_certificate_id, $patientData->id);
        $drivingCertificate = $patient->getDrivingCertificate($patientData->id);
        $weaponCertificate = $patient->getWeaponCertificate($patientData->id);
        $pill = new PillService();
        $pills = $pill->getPillsWithRecipe();
        $recipes = $pill->getPatientsRecipes($patientData->id);
        return view('pages.patient',compact('patientData','medCertificate','psyCertificate','permissions','drivingCertificate','weaponCertificate','pills','recipes','role'));
    }

    public function storeRecipe(Request $request){
        $doctor = new DoctorService();
        $recipe = new PatientService();
        $store = $recipe->storeRecipe(
            $recipe->getPatientsIdByRegNumber($request->input('reg_number')),
            $request->input('diagnosis'),
            $request->input('type'),
            $request->input('days'),
            $request->input('pills_amount'),
            $doctor->getIdByName($request->session()->get('doctor_name'))  
        );
        return redirect('/patients'.'/'.$request->input('reg_number'));
    }

    /*
    public function storeDrivingCertificate(){
        
    }

    public function storeWeaponCertificate(){
        
    }
    */

    public function medCertifStore(Request $request){
        $patient = new PatientService();
        $patient->storeMedicalCertificate($request->input('reg_number'),$request->input('details'),$request->session()->get('doctor_name'));
        return redirect('/patients'.'/'.$request->input('reg_number'));
    }

    public function psychCertifStore(Request $request){
        $patient = new PatientService();
        $patient->storePsychologicalCertificate($request->input('reg_number'),$request->input('details'),$request->session()->get('doctor_name'));
        return redirect('/patients'.'/'.$request->input('reg_number'));
    }

}
