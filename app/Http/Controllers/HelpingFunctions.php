<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelpingFunctions extends Controller
{
    //get patient name by reg_number
    static function getPatientsName(String $reg_number){
        $patietnName = DB::table('patients')->where('reg_number',$reg_number)->value('patient_name');
        return $patietnName;
    }
    
    //get patient id by reg_number
    static function getPatientsId(String $reg_number){
    	$patietnId = DB::table('patients')->where('reg_number',$reg_number)->value('id');
    	return $patietnId;
    }

    //get doctor id by reg_number
    static function getDoctorsId(String $doctor){
    	$doctorId = DB::table('doctors')->where('doctor_name',$doctor)->value('id');
    	return $doctorId;
    }
}
