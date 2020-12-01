<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserProfileRequest extends FormRequest
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
            'name' => 'bail|required|string|max:255',
            'family' => 'bail|required|string|max:255',
//            'branch_id' => 'bail|required|string|max:255',
            'birthdate' => 'bail|required|string|max:255',
            'region_id' => 'bail|required|numeric|max:200',
            'email' => [
                'bail',
                'required',
                'email',
                Rule::unique('users')->ignore(auth()->user()->id)
            ],
            'phone' => [
                'bail',
                'required',
                'numeric',
                Rule::unique('users')->ignore(auth()->user()->id)
            ],
//            'serial_number' => 'bail|required|string|max:255',
            'fin' => 'bail|required|string|max:255',
//            'citizenship' => 'bail|required|string|max:255',
            'address' => 'bail|required|string|max:255',
//            'gender' => 'required|numeric|string'
        ];
    }
}
