<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\HospitalService;

class HospitalController extends Controller
{
    public function index(Request $request){
    	$dateBase = new HospitalService();
    	$permissions = $dateBase->getHospitalPagePermission($request->session()->get('role'));
    	//$incomes = $dateBase->getDateBaseList();
    	$hospital_data = [];
    	return view('pages.hospital',compact('hospital_data','permissions'));
  	}
}
