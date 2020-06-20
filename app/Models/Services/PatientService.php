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

class PatientService extends BasePatientService
{
    //create patient
	public function createNewPatient(string $patientName, string $regNumber, bool $isDead){
        $id = parent::createNewPatient($patientName, $regNumber, $isDead);
    }
    
    //update insurance
    public function updateInsurance(int $patientId, int $insuranceId){
        $active_from = Carbon::now();
        $active_to = Carbon::now()->addMonth();
        $insurance = Insurance::where('patient_id', $patientId)
            ->update(['insurance_type_id' => $insuranceId, 'is_active' => false, 'active_from' => $active_from, 'active_to' => $active_to]);
    }

    //get list of patients 
    public function getListOfPatients(){
        $patients_data = DB::table('patients')
            ->join('insurances', 'patients.id', 'insurances.patient_id')
            ->join('insurance_types', 'insurance_types.id', 'insurances.insurance_type_id')
            ->where('is_dead', false)
            ->select('patient_name', 'reg_number', 'insurance_types.id', 'insurance_type', 'active_from','active_to', 'is_active', 'medical_certificate_id', 'psychological_certificate_id')
            ->get();
        return $patients_data;
    }
    
    //activate insurance
    public function activatePatientInsurance(string $regnumber){
        $patientId = $this->getPatientsIdByRegNumber($regnumber);
        Insurance::where('patient_id', $patientId)->update(['is_active'=>true]);
    }

}