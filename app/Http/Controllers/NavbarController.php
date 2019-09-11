<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\PatientExistRule;
use App\Http\Controllers\HelpingFunctions;

class NavbarController extends Controller
{
    public function find(Request $request){
    	$request->validate([
            'reg_number'=>['required', new PatientExistRule],
        ]);
    	$user = HelpingFunctions::getPatientsName($request->input('reg_number'));
    	return redirect('patients/'.$user);
    }
}
