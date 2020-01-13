<?php

namespace App\Models\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Entities\InsuranceType;

class InsuranceService
{
    public function getInsurances(){
    	return $insurances = InsuranceType::all();
    }

    public function getInsuranceByPatientRegNumber(String $regNumber){
    	$insuranceData = DB::table('insurances')
    					->join('patients','insurances.patient_id','patients.id')
    					->join('insurance_types','insurances.insurance_type_id','insurance_types.id')
    					->where('patients.reg_number',$regNumber)
    					->select('insurances.is_active','insurance_type','insurance_percent')
    					->first();
    	return $insuranceData;	
    }

    public function getInsuranceByPatientId(int $id){
        $insuranceData = DB::table('insurances')
                        ->join('insurance_types','insurances.insurance_type_id','insurance_types.id')
                        ->where('patient_id',$id)
                        ->select('is_active','insurance_type','insurance_percent')
                        ->first();
        return $insuranceData;  
    }
}
