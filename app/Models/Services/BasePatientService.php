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

class BasePatientService
{
	//create patient
	protected function createNewPatient(string $patientName, string $regNumber, bool $isDead){
		if(is_null($this->getPatientIdByRegNumber($regNumber))){
			$patient = new Patient();
			$patient->patient_name = $patientName;
			$patient->reg_number = $regNumber;
			$patient->is_dead = $isDead;
			$patient->save();
			$patientId = $this->getPatientIdByRegNumber($regNumber);
			if(!$isDead) {
				$this->createNewInsurance($patientId);
			}
		}
	}

	//create insurance
	protected function createNewInsurance(int $patientId){
		$insurance = new Insurance();
        $insurance->insurance_type_id = 1;
        $insurance->is_active = true;
        $insurance->patient_id = $patientId; 
        $insurance->active_from = Carbon::now();
        $insurance->active_to = Carbon::now()->addDays(7);
        $insurance->save();
	}

	//get pation by regnumber
    protected function getPatientIdByRegNumber(String $regNumber){
		$patietnId = Patient::where('reg_number',$regNumber)->value('id');
    	return $patietnId;
	}

	//get pation by name
	protected function getPatientsIdByName(String $patientName){
		$regNumber = null;
        $patietnId = Patient::where([
			['patient_name', '=', $patientName],
			['reg_number', '=', $regNumber]
		])->value('id');
        return $patietnId;
	}
	
	//get pation data by regnumber
    protected function getPatientByRegNumber(String $regNumber){
        return $patient = Patient::where('reg_number', $regNumber)->first();
	}
	
	//get user permissions
	public function getPermissions(String $role){
        $permissions = Role::where('role_name', $role)->first();
        return $permissions;
    }
}