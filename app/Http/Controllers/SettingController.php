<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\SettingService;

class SettingController extends Controller
{
    public function index(Request $request){
        $setting = new SettingService;
        $settings = $setting->getSettings();
        return view('pages.settingspage',compact('settings'));
    }

    public function updateOrCreatePill(Request $request){
        $setting = new SettingService();
        $updateOrInsert = $setting->updateOrCreatePill(
        	$request->input('pill_name'),
        	$request->input('pill_recipe'),
        	$request->input('pill_price')
        );
        return redirect('/settings');
    }

    public function updateOrCreateRole(Request $request){
        
    } 
}
