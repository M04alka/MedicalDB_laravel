<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\IncomeService;

class IncomeController extends Controller
{
    public function index(Request $request){
    	$dateBase = new IncomeService();
    	$permissions = $dateBase->getDateBasePermissions($request->session()->get('role'));
    	$incomes = $dateBase->getDateBaseList();
    	return view('pages.income',compact('incomes','permissions'));
  	}
  	
  	public function store(Request $request){
    	$dateBase = new IncomeService();
    	$store = $dateBase->store(
      		$request->input('patient_name'),
      		$request->input('reg_number'),
      		$request->input('payment'),
      		$request->input('diagnosis'),
      		$request->input('treatment'),
      		$request->session()->get('doctor_name')
    	);
    	if($store){
      		return redirect('/incomes');
    	}
    	else return back()->withErrors(["msg"=>"Страховка данного пациента прострочена и он должен заплатить за лечение!"]); 
  }
}
