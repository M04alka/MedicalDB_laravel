<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelpingFunctions extends Controller
{
    //get patient name by reg_number
    static function getPatientsName(String $reg_number){
        $patietn_name = DB::table('patients')->where('reg_number',$reg_number)->value('patient_name');
        return $patietn_name;
    }
    
    //get patient id by reg_number
    static function getPatientsId(String $reg_number){
    	$patietn_id = DB::table('patients')->where('reg_number',$reg_number)->value('id');
    	return $patietn_id;
    }

    //get doctor id by reg_number
    static function getDoctorsId(String $doctor){
    	$doctor_id = DB::table('doctors')->where('doctor_name',$doctor)->value('id');
    	return $doctor_id;
    }
}
