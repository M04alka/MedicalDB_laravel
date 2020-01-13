<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DoctorAlreadyExistRule implements Rule
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
        $doctor = DB::table('patients')->where('reg_number',$value)->first();
        if(!$patient) return true;
        else return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Пользователь с такими даными не найден!';
    }
}
