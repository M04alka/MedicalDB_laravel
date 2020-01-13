<?php

namespace App\Models\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Entities\Role;
use App\Models\Entities\Income;
use App\Models\Services\PatientService;
use App\Models\Services\DoctorService;
use App\Models\Services\InsuranceService;
use Carbon\Carbon;

class IncomeService
{
    public function getDateBaseList(){
    	$incomes=DB::table('incomes')
        	->join('doctors', 'incomes.doctor_id', 'doctors.id')
        	->join('patients', 'incomes.patient_id', 'patients.id')
        	->select('incomes.id','patient_name','patients.reg_number','diagnosis','payment','treatment','date','doctor_name')
        	->get();
        return $incomes;
    }

    public function getDateBasePermissions(String $role){
		$permissions = Role::where('role_name', $role)->select('add_to_income','is_admin')->first();
      	return $permissions;
    }

    public function store(String $patientName, String $regNumber, $payment, String $diagnosis, String $treatment, String $doctorName){
    	$insurance = new InsuranceService();
    	$patient = new PatientService();
    	$doctor = new DoctorService();
    	$dateBase = new Income();
    	$dateBase->diagnosis = $diagnosis;
    	$dateBase->treatment = $treatment;
        $dateBase->date = Carbon::now();
    	$dateBase->doctor_id = $doctor->getIdByName($doctorName);
    	//check if this user exist in system(if no - then register him)
    	$patientId = $patient->getPatientsIdByRegNumber($regNumber);
    	if(empty($patientId)){
    		$newPatientId = $patient->registerNewPatient($patientName, $regNumber, false);
    		$dateBase->patient_id = $newPatientId;
    		//if payment==0 then insurance can cover all expenses else calculate final sum
    		if(empty($payment)){
    			$dateBase->payment = "Льготная страховка";
    		}
    		else $dateBase->payment = strval($payment-(($payment*20)/100))."$";
    	}
    	//if user is already in system 
    	else {
    		$dateBase->patient_id = $patientId;
    		$insuranceData = $insurance->getInsuranceByPatientId($patientId);
    		//check if insurance is not expired
    		if($insuranceData->is_active){
    			//if payment==0 then insurance can cover all expenses else calculate final sum
    			if(empty($payment)){
    				$dateBase->payment = $insuranceData->insurance_type;
    			}
    			else $dateBase->payment = strval($payment-(($payment*$insuranceData->insurance_percent)/100))."$";
    		}
    		//if payment==0 and insurance is expired retun false
    		else {
    			if(empty($payment)){
    				return false;
    			}
    			else $dateBase->payment = strval($payment)."$";
    		}		
    	}
    	//all is good
    	$dateBase->save();
    	return true;
    }
  
}
