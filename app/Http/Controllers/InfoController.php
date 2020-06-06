<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\PillService;
use App\Models\Services\InsuranceService;
use App\Models\Services\InfoService;

class InfoController extends Controller
{
    public function index(Request $request){
    	$role = strval ($request->session()->get('role'));
    	$pill = new PillService();
    	$insurance = new InsuranceService();
    	$info = new InfoService();
    	$pills = $pill->getPills();
    	$insurances = $insurance->getInsurances();
    	$permissions = $info->getInfoPermission($role);
    	return view('pages.info',compact('insurances','pills','role','permissions'));
    }
}
