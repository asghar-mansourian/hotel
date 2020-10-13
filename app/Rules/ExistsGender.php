<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class ExistsGender implements Rule
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
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $key)
    {
        return array_key_exists($key, User::GENDER_ALL);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'gender not exits';
    }
}
