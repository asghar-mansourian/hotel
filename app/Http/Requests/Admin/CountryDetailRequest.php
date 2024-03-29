<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CountryDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'country_id' => ['required'],
            'names' => ['required', 'array', 'min:1'],
            'names.*' => ['required', 'distinct', 'string'],
            'values' => ['required', 'array', 'min:1'],
            'values.*' => ['required', 'distinct', 'string'],

        ];
    }
}
