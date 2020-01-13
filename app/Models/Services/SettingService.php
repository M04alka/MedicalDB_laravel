<?php

namespace App\Models\Services;

use App\Models\Entities\Setting;
use App\Models\Entities\PillType;

class SettingService
{
    public function getAutoActiveInsurance(){
    	return Setting::where('setting_type','sell_pills_without_insurance')->value('setting_value');
    }
    public function getPillsCount(){
    	return Setting::where('setting_type','pills_count')->value('setting_value');
    }

    public function setPillsCount(int $count){
        return Setting::where('setting_type','pills_count')->update(['setting_value' => $count]);
    }

    public function setAutoActiveInsurance(){
        $permission = Setting::where('setting_type','auto_active_insurance')->get();
        if($permission->setting_value) return Setting::where('setting_type','auto_active_insurance')->update(['setting_value' => 0]);
        else return Setting::where('setting_type','auto_active_insurance')->update(['setting_value' => 1]);
    }

    public function setSellPillsWithInsurance(){
        $permission = Setting::where('setting_type','sell_pills_without_insurance')->get();
        if($permission->setting_value) return Setting::where('setting_type','sell_pills_without_insurance')->update(['setting_value' => 0]);
        else return Setting::where('setting_type','sell_pills_without_insurance')->update(['setting_value' => 1]);
    }

    public function updateOrCreatePill(string $pillName, bool $recipe, int $pillPrice){
        PillType::updateOrCreate(
            ['pill_name' => $pillName],
            ['pill_recipe' => $recipe, 'pill_price' => $pillPrice]
        );
    }

    public function updateOrCreateRole(){
        RoleType::updateOrCreate(
            [],
            []
        );
    }

    public function getSettings(){
        $settings = Setting::pluck('setting_value', 'setting_type')->toArray();
        return $settings;
    }

     public function getInsuranceSetting(){
        $setting = Setting::where('setting_type','sell_pills_without_insurance')->value('setting_value');
        return $setting;
    }   
}
