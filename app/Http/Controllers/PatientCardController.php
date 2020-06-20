<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\InsuranceService;
use App\Models\Services\PatientCardService;
use App\Models\Services\PillService;
use App\Models\Services\DoctorService;

class PatientCardController extends Controller
{
    //get patient page
    public function show(Request $request, $regNumber){
        $patient = new PatientCardService();
        $role = $request->session()->get('role');
        $permissions = $patient->getPermissions($request->session()->get('role'));
        $patientData = $patient->getPatientInsurance($regNumber);
        $medCertificate = $patient->getMedicalCertificate($patientData->id, 1);
        $psyCertificate = $patient->getPsychologicalCertificate($patientData->id, 1);
        $drivingCertificate = $patient->getPsychologicalCertificate($patientData->id, 2);
        $weaponCertificate = $patient->getPsychologicalCertificate($patientData->id, 3);
        $pill = new PillService();
        $pills = $pill->getPillsWithRecipe();
        $recipes = $patient->getRecipes($patientData->id);
        return view('pages.patient',compact('patientData','medCertificate','psyCertificate','permissions','drivingCertificate','weaponCertificate','pills','recipes','role'));
    }

    //add new recipe
    public function storeRecipe(Request $request){
        $recipe = new PatientCardService();
        $store = $recipe->addRecipe(
            $request->input('reg_number'),
            $request->input('diagnosis'),
            $request->input('type'),
            $request->input('days'),
            $request->input('pills_amount'),
            $request->session()->get('doctor_id')  
        );
        return redirect('/patients'.'/'.$request->input('reg_number'));
    }

    //add medical certificate
    public function medCertifStore(Request $request){
        $patient = new PatientCardService();
        $patient->addMedicalCertificate($request->input('reg_number'),$request->input('details'),$request->session()->get('doctor_name'), 1);
        return redirect('/patients'.'/'.$request->input('reg_number'));
    }

     //add PsychologicalCertificate certificate
    public function psychCertifStore(Request $request){
        $patient = new PatientCardService();
        $patient->addPsychologicalCertificate($request->input('reg_number'),$request->input('details'),$request->session()->get('doctor_name'), 1);
        return redirect('/patients'.'/'.$request->input('reg_number'));
    }

    //add driving certificate
    public function storeDrivingCertificate(Request $request){
        $patient = new PatientCardService();
        $patient->addPsychologicalCertificate($request->input('reg_number'),$request->input('details'),$request->session()->get('doctor_name'), 2);
        return redirect('/patients'.'/'.$request->input('reg_number'));
    }

    //add weapon certificate
    public function storeWeaponCertificate(Request $request){
        $patient = new PatientCardService();
        $patient->addPsychologicalCertificate($request->input('reg_number'),$request->input('details'),$request->session()->get('doctor_name'), 3);
        return redirect('/patients'.'/'.$request->input('reg_number'));
    }

}
