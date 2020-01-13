<?php

namespace App\Models\Services;

use App\Models\Entities\Role;
use App\Models\Entities\Morgue;
use App\Models\Entities\Patient;
use App\Models\Services\PatientService;
use App\Models\Entities\Doctor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MorgueService
{
    public function getMorgueList(){
    	$morgueData = DB::table('morgues')
      	->join('doctors', 'morgues.doctor_id', 'doctors.id')
      	->join('patients', 'morgues.patient_id', 'patients.id')
      	->select('morgues.id','patient_name','patients.reg_number','date','time_of_deth','autopsy_result','additional_information','doctor_name')
        ->orderBy('morgues.id', 'desc')
        ->paginate(5);
      return $morgueData;
    }
    
    public function getMorguePermissions(String $role){
      $permissions = Role::where('role_name', $role)->select('add_to_morgue','is_admin')->first();
      return $permissions;
    }

    public function store($regNumber, $patientName, $timeOfDeth, $autopsyResult, $additionalInformation, $doctorName){
      $morgue = new Morgue();
      $patientService = new PatientService();
      $doctorService = new DoctorService();
      //if patient name and reg number are unknown
      if(is_null($regNumber) && is_null($patientName)){
        $morgue->patient_id = 1;
      }
      //if patient name is known and reg number is unknown
      elseif(is_null($regNumber) && !is_null($patientName)){

        $patientId = $patientService->getPatientsIdByName($patientName);

        if(is_null($patientId)){
          $morgue->patient_id = $patientService->registerNewPatient($patientName, $regNumber, true);
        }
        else $morgue->patient_id = $patientId;
        
      }
      //if patient reg number is known (name doesn't metter, it's easy to find someone by reg number)
      else {
        $patientData = $patientService->getPatientByRegNumber($regNumber);
        if(is_null($patientData)){
          $morgue->patient_id = $patientService->registerNewPatient($patientName, $regNumber, true);
        }
        else {
          $morgue->patient_id = $patientData->id;
          $patient = $this->updatePatient($patientData->id);
        }
      }
      $morgue->date = Carbon::now();
      $morgue->time_of_deth = $timeOfDeth;
      $morgue->autopsy_result = $autopsyResult;
      $morgue->additional_information = $additionalInformation;
      $morgue->doctor_id = $doctorService->getIdByName($doctorName); 
      $morgue->save();
    }

    private function updatePatient(int $patientId){
      Patient::where('id', $patientId)->update(['is_dead' => true]);
    }
}