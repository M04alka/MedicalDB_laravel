<?php

namespace App\Models\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Entities\Role;
use App\Models\Entities\Recipe;
use App\Models\Entities\Pill;
use App\Models\Entities\PillType;
use App\Models\Entities\Setting;
use App\Models\Services\PatientService;
use App\Models\Services\DoctorService;
use Carbon\Carbon;

class PillService 
{
    public function getPillsList(){
    	$sales = DB::table('pills')
    	        ->join('pill_types', 'pills.pill_type_id', 'pill_types.id')
                ->join('doctors', 'pills.doctors_id', 'doctors.id')
                ->join('patients', 'pills.patient_id', 'patients.id')
                ->select('pills.id','patient_name','patients.reg_number','date', 'pill_name','ammount','doctor_name')
                ->orderBy('pills.id', 'asc')
    	        ->paginate(8);
    	return $sales;
    }

    public function getPills(){
    	return $pillsTypes = PillType::all();
    }

    public function getPillsPermissions(String $role){
      $permissions = Role::where('role_name', $role)->select('sell_pills','is_admin')->first();
      return $permissions;
    } 

    public function getPillsWithRecipe(){
        return $pillsTypes = DB::table('pill_types')->where('pill_recipe',true)->get();
    }

    public function getPatientsRecipes(int $patientId){
        return $recipes = Recipe::where('patient_id', $patientId)
                    ->join('pill_types', 'recipes.pill_type_id', 'pill_types.id')
                    ->join('doctors', 'recipes.doctor_id', 'doctors.id')
                    ->get();
    }

    public function store($regNumber, $patientName, $doctorName, $pillType, $pillCount){
        $pill = new Pill();
        $patient = new PatientService();
        $doctor = new DoctorService();
        $patientId = $patient->getPatientsIdByRegNumber($regNumber);
        if(is_null($patientId)){
            $newPatient = $patient->registerNewPatient($regNumber, $patientName, false);
            $pill->patient_id = $newPatient;
        }
        else{
            $pill->patient_id = $patientId;
        }
        $pillrecipe = $this->getPillRecipe($pillType);
        if($pillrecipe){
            $recipeValidation = $patient->getPatientRecipe($patientId, $pillType);
            if(is_null($recipeValidation)){
                return "recipe error"; // change for more 
            }
            else{
                if($pillCount > $recipeValidation->dose){
                    return "recipe count error";
                }
                else{
                    $pill->date = Carbon::now();
                    $pill->pill_type_id = $pillType;
                    $pill->ammount = $pillCount;
                    $pill->doctors_id = $doctor->getIdByName($doctorName);
                    $pill->save();
                    $patient->updateRecipe($recipeValidation->id, $recipeValidation->dose, $pillCount);
                } 
               
            }
        }
        else{
            $setting = new SettingService();
            if($pillCount > $setting->getPillsCount()){
                 return "count error"; // change for more
            }
            else{
                if($setting->getInsuranceSetting()){
                    $pill->date = Carbon::now();
                    $pill->pill_type_id = $pillType;
                    $pill->ammount = $pillCount;
                    $pill->doctors_id = $doctor->getIdByName($doctorName);
                    $pill->save();
                }
                else{
                    $patientInsurance = $patient->getPatientInsurance($regNumber);
                    if($patientInsurance->is_active){
                        $pill->date = Carbon::now();
                        $pill->pill_type_id = $pillType;
                        $pill->ammount = $pillCount;
                        $pill->doctors_id = $doctor->getIdByName($doctorName);
                        $pill->save();
                    }
                    else{
                        return "У пациента просрочена страховка!"; // change for more
                    }
                }
            }
        }
    }

    private function getPillRecipe(int $id){
        return DB::table('pill_types')->where('id', $id)->value('pill_recipe');
    }
}
