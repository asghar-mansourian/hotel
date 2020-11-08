<?php

namespace App\Http\Requests\Admin;

use App\Rules\ExistsGender;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'family' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'numeric', 'unique:users', 'regex:/^(?:0|\(?\+994\)?\s?)[1-79](?:[\.\-\s]?\d\d){4}$/'],
            'serial_number' => ['required', 'max:9', 'unique:users'],
            'citizenship' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'string', 'regex:/(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))/'],
            'gender' => ['required', 'numeric', new ExistsGender()],
            'fin' => ['required', 'min:7', 'max:7'],
            'address' => ['required', 'string', 'max:255'],
        ];
    }
}
