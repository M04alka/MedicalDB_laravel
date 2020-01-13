<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PillsAndInsuranceRule implements Rule
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
        $pills_and_insurance = DB::table('settings')->where('setting_type','sell_pills_without_insurance')->value('value');
        if($pills_and_insurance == 1) return false;
        else return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Нельзя продавать препараты без страховки!';
    }
}
