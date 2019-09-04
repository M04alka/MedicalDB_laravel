<?php

namespace App\Rules;

use App\Patient;
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
        $id = Patient::where('reg_number', $value)->value('id');
        if(is_null($id)) return false;
        else{
            $isActive = DB::table('insurances')->where('id', $id)->value('is_active');
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
