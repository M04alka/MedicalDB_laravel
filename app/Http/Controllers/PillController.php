<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\PillService;

class PillController extends Controller
{
    //get pills page
    public function index(Request $request){
    	$pills = new PillService();
        $sales = $pills->getPillsList();
        $pillsTypes = $pills->getPills();
        $permissions = $pills->getPillsPermissions($request->session()->get('role'));
    	return view('pages.pills',compact('sales','pillsTypes','permissions'));
    }

    public function store(Request $request){
        $pills = new PillService();
        $state = $pills->store(
            $request->input('reg_number'),
            $request->input('patient_name'),
            $request->session()->get('doctor_name'),
            $request->input('type'),
            $request->input('count')
        );
        if($state=="recipe error") {
            return back()->withErrors(["msg"=> "У данного пациента нету рецепта на данные таблетки!"]);
        }
        elseif($state=="count error"){
            return back()->withErrors(["msg"=> "Нельзя продавать такое количество таблеток!"]);
        }
        elseif($state=="recipe count error"){
            return back()->withErrors(["msg"=> "Вы пытаетесь продать таблеток больше чем доза в рецепте!"]);
        }
        else return back()->withErrors(["msg"=> "У пациента просрочена страховка!"]);
    }
}
