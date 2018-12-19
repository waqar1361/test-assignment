<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class phone implements Rule
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
        $head = substr($value, 0,4);
        
        if ($head == 9665){
            return true;
        }
        
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Enter a valid Phone Number, it\'s in wrong format must start with 9665';
    }
}
