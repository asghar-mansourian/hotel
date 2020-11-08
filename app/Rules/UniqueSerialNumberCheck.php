<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UniqueSerialNumberCheck implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id , $model)
    {
        $this->id = $id;
        $this->model = $model;
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

        return $this->model::query()->whereId($this->id)->first()->serial_number == $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This Serial Number Is Not Exist.';
    }
}
