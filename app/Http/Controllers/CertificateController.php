<?php

namespace App\Http\Controllers;

use InsurancesController;
use Carbon\Carbon;
use App\Certificate;
use App\MedicalCertificate;
use App\PsychologicalCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
{
    public function index(Request $request){
    	$role = $request->session()->get('role');
    	$error = false;
    	return view('pages.certificate',compact('role','error'));
    }

    public function store(Request $request){

    	$doctor = $request->session()->get('doctor_name');
    	$reg_number = $request->input('reg_number');
    	$doctor_id = $this->getDoctorsId($doctor);
    	$patietn_id = $this->getPatientsId($reg_number);
    	
    	if($patietn_id==null){
    		$error = "Такого пациента не существует!";
    		return view('pages.certificate',compact('error'));
    	}
    	else {
    		$error = false;
    		$certificate = new Certificate();
    		$certificate->details = $request->input('details');
    		$certificate->date = Carbon::now();
    		$certificate->type_of_certificate_id = $request->input('type');
    		$certificate->doctors_id = $doctor_id;
    		$certificate->patient_id = $patietn_id;
  			$certificate->save();
  			return view('pages.certificate',compact('error'));
  		}  
    	
    }

    public function getPatientsName(String $reg_number){
        $patietn_name = Db::table('patients')->where('reg_number',$reg_number)->value('patient_name');
        return $patietn_name;
    }

    public function getPatientsId(String $reg_number){
    	$patietn_id = Db::table('patients')->where('reg_number',$reg_number)->value('id');
    	return $patietn_id;
    }

    public function getDoctorsId(String $doctor){
    	$doctor_id = DB::table('doctors')->where('doctor_name',$doctor)->value('id');
    	return $doctor_id;
    }

    public function medCertifStore(Request $request){
        $role = $request->session()->get('role');
        $doctor = $request->session()->get('doctor_name');
        $patient = $this->getPatientsName($request->input('reg_number'));
        $medicalCertificate = new MedicalCertificate();
        $medicalCertificate->patient_id = $this->getPatientsId($request->input('reg_number'));
        $medicalCertificate->date = Carbon::now();
        $medicalCertificate->details = $request->input('details');
        $medicalCertificate->doctors_id = $this->getDoctorsId($doctor);
        $medicalCertificate->save();
        $error = false;
        $this->updateMedInsurance($this->getPatientsId($request->input('reg_number')));
        return redirect('/patients'.'/'.$patient)->with('role','error');
    }

    public function psychCertifStore(Request $request){
        $role = $request->session()->get('role');
        $doctor = $request->session()->get('doctor_name');
        $patient = $this->getPatientsName($request->input('reg_number'));
        $psychologicalCertificate = new PsychologicalCertificate();
        $psychologicalCertificate->patient_id = $this->getPatientsId($request->input('reg_number'));
        $psychologicalCertificate->date = Carbon::now();
        $psychologicalCertificate->details = $request->input('details');
        $psychologicalCertificate->doctors_id = $this->getDoctorsId($doctor);
        $psychologicalCertificate->save();
        $error = false;
        $this->updatePsyInsurance($this->getPatientsId($request->input('reg_number')));
        return redirect('/patients'.'/'.$patient)->with('role','error');   
    }

    public function updateMedInsurance($id){
        $med_id = DB::table('medical_certificates')->where('patient_id',$id)->value('id');
        DB::table('insurances')->where('id',$id)->update(['medical_certificate_id' => $med_id ]);
    }

    public function updatePsyInsurance($id){
        $psy_id = DB::table('psychological_certificates')->where('patient_id',$id)->value('id');
        DB::table('insurances')->where('id',$id)->update(['psychological_certificate_id' => $psy_id]);
    }

}
