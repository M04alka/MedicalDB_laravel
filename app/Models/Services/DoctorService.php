<?php

namespace App\Models\Services;

use App\Models\Entities\Doctor;
use Illuminate\Support\Facades\DB;

class DoctorService
{
   	public function authorization(String $doctorName, String $regNumber){
    	$doctor = Doctor::where([
                ['doctor_name',  $doctorName],
                ['password', $regNumber]
            ])
            ->join('roles','doctors.role_id','roles.id')
            ->first(['doctors.id','doctor_name', 'is_active', 'role_name']);
        return $doctor;    
    }

    public function registration(String $doctorName, String $regNumber, String $password){
    	$user = Doctor::where('reg_number', $regNumber)->first();
        if(empty($user)){
            $doctor = new Doctor();
            $doctor->doctor_name = $doctorName;
            $doctor->password = $password;
            $doctor->reg_number = $regNumber;
            $doctor->save();
            return true;
        }
        else return false;
    }

    public function getIdByName(string $doctorName){
        $doctorId = DB::table('doctors')->where('doctor_name',$doctorName)->value('id');
        return $doctorId;
    }

    public function getListOfNewUsers(){
       return Doctor::where('is_active', false)->get();
    }

    public function getListOfFiredDoctros(){
       return Doctor::where('is_fired', true)->get();
    }

    public function getListOfDoctors(){
       return Doctor::where('is_active', true)->get();
    }
}
