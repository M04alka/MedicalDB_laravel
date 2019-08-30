<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InsurancesController extends Controller
{
    public function updateMedInsurance($id){
    	$med_id = DB::table('medical_certificates')->where('patient_id',$id)->value('id');
    	DB::table('insurances')->where('id',$id)->update(['medical_certificate_id' => $med_id ]);
    }

    public function updatePsyInsurance($id){
    	$psy_id = DB::table('psychological_certificates')->where('patient_id',$id)->value('id');
    	DB::table('insurances')->where('id',$id)->update(['psychological_certificate_id' => $psy_id]);
    }
}
