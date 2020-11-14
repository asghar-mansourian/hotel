<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CalculatorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'currency' => ['required', 'max:10'],
            'country_id' => ['required'],
            'unit_id' => ['required'],
            'from' => ['required', 'max:5'],
            'to' => ['required', 'max:5'],
        ];
    }
}
