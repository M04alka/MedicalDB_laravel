<?php

namespace App\Rules;

use App\Patient;
use App\Insurance;
use App\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Rule;

class IsInsuranceActiveRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $patient_id = Patient::where('reg_number', $value)->value('id');
        $setting = Setting::where('setting_type','sell_pills_without_insurance' )->value('value');
        if($setting) {
            return true;
        } 
        else {
            $isActive = Insurance::where('patient_id', $patient_id)->value('is_active');
            return $isActive;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Страховка данного пациента просрочена!';
    }
}
