<?php

namespace App\Http\Controllers;
use App\MedicalCertificate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\PsychologicalCertificate;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HelpingFunctions;

class PatientController extends Controller
{
    //get patient card
    public function index(Request $request, $patient){
        $role = $request->session()->get('role');
        $name = $request->session()->get('doctor_name');
        $patient_data = DB::table('patients')->where('patient_name',$patient)
            ->join('insurances', 'patients.id', 'insurances.id')
            ->join('types_of_insurance', 'insurances.type_id', 'types_of_insurance.id')
            ->select('patients.id','patient_name','reg_number','type','medical_certificate_id','psychological_certificate_id')
            ->first();
          
            if(is_null($patient_data->medical_certificate_id)){
                $med_cert = false;
            }
            else $med_cert = DB::table('medical_certificates')
                ->where('patient_id', $patient_data->id)->get();

            if(is_null($patient_data->psychological_certificate_id)){
                $psy_cert = false;
            }
            else $psy_cert = DB::table('psychological_certificates')
                ->where('patient_id', $patient_data->id)->get();
            
        return view('pages.patient',compact('patient_data','role','med_cert','psy_cert','name'));
    }

    //store med certificate for users insurance
    public function medCertifStore(Request $request){
        $role = $request->session()->get('role');
        $doctor = $request->session()->get('doctor_name');
        $patient = HelpingFunctions::getPatientsName($request->input('reg_number'));
        $patientId = HelpingFunctions::getPatientsId($request->input('reg_number'));
        $doctorId = HelpingFunctions::getDoctorsId($doctor);
        $medicalCertificate = new MedicalCertificate();
        $medicalCertificate->patient_id = $patientId;
        $medicalCertificate->date = Carbon::now();
        $medicalCertificate->details = $request->input('details');
        $medicalCertificate->doctors_id = $doctorId;
        $medicalCertificate->save();
        $this->updateMedInsurance($patientId);
        return redirect('/patients'.'/'.$patient)->with('role');
    }

    //store psy certificate for users insurance
    public function psychCertifStore(Request $request){
        $role = $request->session()->get('role');
        $doctor = $request->session()->get('doctor_name');
        $patient = HelpingFunctions::getPatientsName($request->input('reg_number'));
        $patientId = HelpingFunctions::getPatientsId($request->input('reg_number'));
        $doctorId = HelpingFunctions::getDoctorsId($doctor);
        $psychologicalCertificate = new PsychologicalCertificate();
        $psychologicalCertificate->patient_id = $patientId;
        $psychologicalCertificate->date = Carbon::now();
        $psychologicalCertificate->details = $request->input('details');
        $psychologicalCertificate->doctors_id = $doctorId;
        $psychologicalCertificate->save();
        $error = false;
        $this->updatePsyInsurance($patientId);
        return redirect('/patients'.'/'.$patient)->with('role','error');   
    }

    //update insurance field medical_certificate_id
    public function updateMedInsurance($id){
        $medId = DB::table('medical_certificates')->where('patient_id',$id)->value('id');
        DB::table('insurances')->where('id',$id)->update(['medical_certificate_id' => $medId ]);
    }

    //update insurance field psychological_certificate_id
    public function updatePsyInsurance($id){
        $psyId = DB::table('psychological_certificates')->where('patient_id',$id)->value('id');
        DB::table('insurances')->where('id',$id)->update(['psychological_certificate_id' => $psyId]);
    }
}
