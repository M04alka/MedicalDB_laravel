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
use Illuminate\Support\Facades\DB;

class PatientService
{

    //PATIENTS PAGE FUNCTIONS

	public function registerNewPatient(string $patientName, string $regNumber, bool $isDead){
		$patient = new Patient();
		$patient->patient_name = $patientName;
		$patient->reg_number = $regNumber;
		$patient->is_dead = $isDead;
		$patient->save();
        if(is_null($regNumber)){
            $patientId = $this->getPatientsIdByName($patientName);
        }
		else{
            $patientId = $this->getPatientsIdByRegNumber($regNumber);
        }
		if(!$isDead) {
            $this->registerNewInsurance($patientId);
        }
        return $patientId;
	}

	private function registerNewInsurance(int $patientId){
		$insurance = new Insurance();
        $insurance->insurance_type_id = 1;
        $insurance->is_active = true;
        $insurance->patient_id = $patientId; 
        $insurance->active_from = Carbon::now();
        $insurance->active_to = Carbon::now()->addDays(7);
        $insurance->save();
	}

    public function updateInsurance(int $patientId, int $insuranceId){
        $insurance =Insurance::where('patient_id', $patientId)
            ->update(['insurance_type_id' => $insuranceId, 'is_active' => false]);
    }

    public function getPatientsList(){
        $patients_data = DB::table('patients')
            ->join('insurances', 'patients.id', 'insurances.patient_id')
            ->join('insurance_types', 'insurance_types.id', 'insurances.insurance_type_id')
            ->where('is_dead', false)
            ->select('patient_name','reg_number','insurance_types.id','insurance_type','active_from','active_to','is_active','medical_certificate_id','psychological_certificate_id')
            ->get();
        return $patients_data;
    }

    //SUPPORT FUNCTIONS

	public function getPatientsIdByRegNumber(String $regNumber){
		$patietnId = Patient::where('reg_number',$regNumber)->value('id');
    	return $patietnId;
	}

    public function getPatientsIdByName(String $patientName){
        $patietnId = Patient::where('patient_name',$patientName)->value('id');
        return $patietnId;
    }

    public function getPatientByRegNumber(String $regNumber){
        return $patient = Patient::where('reg_number', $regNumber)->first();
    }

    //PERMISSIONS
    
    public function getPatientsPagePermissions(String $role){
        $permissions = Role::where('role_name', $role)->select('add_patients','update_insurance','is_admin')->first();
        return $permissions;
    }

    public function getPatientPagePermissions(String $role){
        $permissions = Role::where('role_name',$role)->select('write_med_certificates','write_psy_certificates','is_admin','write_recipe')->first();
        return $permissions;
    }

    //SELECTED PATIENT PAGE FUNCTIONS

    public function getPatientInsurance(String $regNumber){
        $patientData = DB::table('insurances')
            ->join('patients', 'insurances.patient_id', 'patients.id')
            ->join('insurance_types', 'insurances.insurance_type_id', 'insurance_types.id')
            ->where('patients.reg_number', $regNumber)
            ->select('patients.id','patient_name','reg_number','insurance_type','medical_certificate_id','psychological_certificate_id','is_active')
            ->first();
        return $patientData;
    }

    public function getMedSertificate($medCertificateId, int $patientId){
        $medCertificate = DB::table('medical_certificates')
        ->where([
            ['certificate_type_id', '=', '1'],
            ['patient_id', '=', $patientId]
        ])
        ->join('doctors', 'medical_certificates.doctor_id', 'doctors.id')
        ->first();
        return $medCertificate;
    }

    public function getPsySertificate($psyCertificateId, int $patientId){
        $psyCertificate = DB::table('psychological_certificates')
        ->where([
            ['certificate_type_id', '=', '1'],
            ['patient_id', '=', $patientId]
        ])
        ->join('doctors', 'psychological_certificates.doctor_id', 'doctors.id')
        ->first();
        return $psyCertificate;
    }

    /*
    public function getDrivingCertificate(int $patientId){
        $drivingCertificate = PsychologicalCertificate::where([
                ['certificate_type_id', '=', '2'],
                ['patient_id', '=', $patientId]
            ])->first();
        return $drivingCertificate;
    }

    public function getWeaponCertificate(int $patientId){
        $weaponCertificate = PsychologicalCertificate::where([
                ['certificate_type_id', '=', '3'],
                ['patient_id', '=', $patientId]
            ])->first();
        return $weaponCertificate;
    }
    */

    public function storeRecipe($patientId, $diagnosis, $pillType, $days, $pillsAmount, $doctorsId){
        $recipe = new Recipe();
        $recipe->patient_id = $patientId;
        $recipe->begin_date = Carbon::now();
        $recipe->end_date = Carbon::now()->addDays($days);
        $recipe->diagnosis = $diagnosis;
        $recipe->pill_type_id = $pillType;
        $recipe->dose = $pillsAmount/$days;
        $recipe->pills_amount = $pillsAmount;
        $recipe->doctor_id = $doctorsId;
        $recipe->save();
        return $recipe;
    }

    /*
    public function storeDrivingCertificate(){
        
    }

    public function storeWeaponCertificate(){
        
    }
    */

    public function storeMedicalCertificate(String $regNumber, string $details, $doctorName){
        $doctor = new DoctorService();
        $medical_certificate = new MedicalCertificate();
        $medical_certificate->patient_id = $this->getPatientsIdByRegNumber($regNumber);
        $medical_certificate->certificate_type_id = 1;
        $medical_certificate->date = Carbon::now();
        $medical_certificate->details = $details;
        $medical_certificate->doctor_id = $doctor->getIdByName($doctorName);
        $medical_certificate->save();
        $this->updateMedInsurance($this->getPatientsIdByRegNumber($regNumber));
    }

    public function storePsychologicalCertificate(String $regNumber, string $details, $doctorName){
        $doctor = new DoctorService();
        $psychological_certificate = new PsychologicalCertificate();
        $psychological_certificate->patient_id = $this->getPatientsIdByRegNumber($regNumber);
        $psychological_certificate->certificate_type_id = 1;
        $psychological_certificate->date = Carbon::now();
        $psychological_certificate->details = $details;
        $psychological_certificate->doctor_id = $doctor->getIdByName($doctorName);
        $psychological_certificate->save();
        $this->updatePsyInsurance($this->getPatientsIdByRegNumber($regNumber));
        //$this->checkCertificates($this->getPatientsIdByRegNumber($regNumber));
    }

    public function updateMedInsurance(int $patineId){
        $med_cert_id = MedicalCertificate::where([
                ['certificate_type_id', '=', '1'],
                ['patient_id', '=', $patineId]
            ])->value('id'); 
        Insurance::where('patient_id', $patineId)->update(['medical_certificate_id' => $med_cert_id]);
    }

    public function updatePsyInsurance(int $patineId){
        $psy_cert_id = PsychologicalCertificate::where([
                ['certificate_type_id', '=', '1'],
                ['patient_id', '=', $patineId]
            ])->value('id'); 
        Insurance::where('patient_id', $patineId)->update(['psychological_certificate_id' => $psy_cert_id]);
    }

    
    public function getPatientRecipe(int $patietnId, int $pillType){
        $recipe = Recipe::where([
                ['patient_id', '=', $patietnId],
                ['pill_type_id', '=', $pillType]
            ])->first();
        if(is_null($recipe)){
            return null;
        }
        else {
            return $recipe;
        }
    }

    public function updateRecipe(int $recipeId, $dose, $pillsAmount){
        Recipe::where('id', $recipeId)->update(['pills_amount' => $pillsAmount - $dose]);
        $recipe = Recipe::where('id', $recipeId)->first();
        if($recipe->pills_amount == 0)  Recipe::where('id', $recipeId)->delete();
    }

    /*
    private function checkCertificates(int $insuranceId){
       $certificates =  Insurance::where('id', $id)->select('medical_certificate_id','psychological_certificate_id')->first();
       if(is_null($certificates->medical_certificate_id) && is_null('psychological_certificate_id')){

       }
       elseif(!is_null($certificates->medical_certificate_id) && is_null('psychological_certificate_id')){

       }
       elseif(is_null($certificates->medical_certificate_id) && !is_null('psychological_certificate_id')){
        
       }
       else $this->insuranceAutoActive($insuranceId);
    }
    */

    private function insuranceAutoActive(int $patientId){
        Insurance::where('patient_id', $patientId)->update(['is_active'=>true]);
    }    
}