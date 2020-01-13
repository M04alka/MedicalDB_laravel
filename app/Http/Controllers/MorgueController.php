<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\MorgueService;

class MorgueController extends Controller
{
  public function index(Request $request){
    $role  = $request->session()->get('role');
    $morgue = new MorgueService();
    $permissions = $morgue->getMorguePermissions($request->session()->get('role'));
    $morgueData = $morgue->getMorgueList();
    return view('pages.morgue',compact('morgueData','permissions'));
  }

  public function store(Request $request){
    $doctor = $request->session()->get('doctor_name');
    $morgue = new MorgueService();
    $register = $morgue->store(
      $request->input('reg_number'),
      $request->input('patient_name'),
      $request->input('time_of_deth'),
      $request->input('autopsy_result'),
      $request->input('additional_information'),
      $request->session()->get('doctor_name')
    );
    return redirect('/morgue');
  }
}
