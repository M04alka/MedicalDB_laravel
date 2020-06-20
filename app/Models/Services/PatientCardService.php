<?php

namespace App\Models\Services;

use App\Models\Entities\Patient;
use App\Models\Entities\Role;
use App\Models\Entities\Insurance;
use App\Models\Entities\PsychologicalCertificate;
use App\Models\Entities\Recipe;
use App\Models\Entities\MedicalCertificate;
use Carbon\Carbon;
use App\Models\Services\DoctorService;
use App\Models\Services\BasePatientService;
use Illuminate\Support\Facades\DB;

class PatientCardService extends BasePatientService
{
    //GET

    public function getPatientInsurance(String $regNumber){
        $patientData = DB::table('insurances')
            ->join('patients', 'insurances.patient_id', 'patients.id')
            ->join('insurance_types', 'insurances.insurance_type_id', 'insurance_types.id')
            ->where('patients.reg_number', $regNumber)
            ->select('patients.id','patient_name','reg_number','insurance_type','medical_certificate_id','psychological_certificate_id','is_active')
            ->first();
        return $patientData;
    }

    //get medical certificates
    public function getMedicalCertificate(int $patientId, int $certificateId){
        $medCertificate = DB::table('medical_certificates')
        ->where([
            ['certificate_type_id', '=', $certificateId],
            ['patient_id', '=', $patientId]
        ])
        ->join('doctors', 'medical_certificates.doctor_id', 'doctors.id')
        ->first();
        return $medCertificate;
    }

    //get psychological certificates
    public function getPsychologicalCertificate(int $patientId, int $certificateId){
        $psyCertificate = DB::table('psychological_certificates')
        ->where([
            ['certificate_type_id', '=', $certificateId],
            ['patient_id', '=', $patientId]
        ])
        ->join('doctors', 'psychological_certificates.doctor_id', 'doctors.id')
        ->first();
        return $psyCertificate;
    }

    public function getRecipes(int $patientId){
        return $recipes = Recipe::where('patient_id', $patientId)
        ->join('pill_types', 'recipes.pill_type_id', 'pill_types.id')
        ->join('doctors', 'recipes.doctor_id', 'doctors.id')
        ->get();
        if(is_null($recipes)){
            return null;
        }
        else {
            return $recipes;
        }
    }

    //POST

    //add medical certificates
    public function addMedicalCertificate(string $regNumber, string $details, $doctorName, int $certificateId){
        $doctor = new DoctorService();
        $medical_certificate = new MedicalCertificate();
        $medical_certificate->patient_id = parent::getPatientIdByRegNumber($regNumber);
        $medical_certificate->certificate_type_id = $certificateId;
        $medical_certificate->date = Carbon::now();
        $medical_certificate->details = $details;
        $medical_certificate->doctor_id = $doctor->getIdByName($doctorName);
        $medical_certificate->save();
        if($certificateId==1){
            $this->updateMedInsurance($this->getPatientIdByRegNumber($regNumber));
        }
    }
    
    //update medical certificate inside insurance 
    private function updateMedInsurance(int $patineId){
        $med_cert_id = MedicalCertificate::where([
                ['certificate_type_id', '=', '1'],
                ['patient_id', '=', $patineId]
            ])->value('id'); 
        Insurance::where('patient_id', $patineId)->update(['medical_certificate_id' => $med_cert_id]);
    }

    //add psychological certificates
    public function addPsychologicalCertificate(string $regNumber, string $details, $doctorName, int $certificateId ){
        $doctor = new DoctorService();
        $psychological_certificate = new PsychologicalCertificate();
        $psychological_certificate->patient_id = parent::getPatientIdByRegNumber($regNumber);
        $psychological_certificate->certificate_type_id = $certificateId;
        $psychological_certificate->date = Carbon::now();
        $psychological_certificate->details = $details;
        $psychological_certificate->doctor_id = $doctor->getIdByName($doctorName);
        $psychological_certificate->save();
        if($certificateId==1){
            $this->updatePsyInsurance($this->getPatientIdByRegNumber($regNumber));
        }
    }

    //update psychological certificate inside insurance 
    private function updatePsyInsurance(int $patineId){
        $psy_cert_id = PsychologicalCertificate::where([
                ['certificate_type_id', '=', '1'],
                ['patient_id', '=', $patineId]
            ])->value('id'); 
        Insurance::where('patient_id', $patineId)->update(['psychological_certificate_id' => $psy_cert_id]);
    }


    public function addRecipe($regNumber, $diagnosis, $pillType, $days, $pillsAmount, $doctorId){
        $recipe = new Recipe();
        $recipe->patient_id = parent::getPatientIdByRegNumber($regNumber);
        $recipe->begin_date = Carbon::now();
        $recipe->end_date = Carbon::now()->addDays($days);
        $recipe->diagnosis = $diagnosis;
        $recipe->pill_type_id = $pillType;
        $recipe->dose = $pillsAmount/$days;
        $recipe->pills_amount = $pillsAmount;
        $recipe->doctor_id = $doctorId;
        $recipe->save();
    }

    //get patient hospital history
    public function getHospitalHistory(string $regNumber){
        $patietnIncomes = DB::table('incomes')
        	->join('doctors', 'incomes.doctor_id', 'doctors.id')
            ->join('patients', 'incomes.patient_id', 'patients.id')
            ->where('reg_number', $regNumber)
        	->select('incomes.id','patient_name','patients.reg_number','diagnosis','payment','treatment','date','doctor_name')
        	->get();
        return $patietnIncomes;
    }
}