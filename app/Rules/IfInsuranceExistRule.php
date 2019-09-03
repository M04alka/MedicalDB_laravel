<?php

namespace App\Rules;

use App\Patient;
use App\Insurance;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Rule;

class IfInsuranceExistRule implements Rule
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
        $insurance = Insurance::find($id);
        if($insurance){
            return true;
        }
        else return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'У пациента с таким номером паспорта отсутствует страховка!';
    }
}
