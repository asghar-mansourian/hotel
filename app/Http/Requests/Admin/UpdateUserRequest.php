<?php

namespace App\Http\Requests\admin;

use App\Rules\ExistsGender;
use App\Rules\UniqueEmailCheck;
use App\Rules\UniquePhoneCheck;
use App\Rules\UniqueSerialNumberCheck;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function __construct($id , $model)
    {
        $this->id = $id;
        $this->model = $model;
    }

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
            'email' => ['required', 'string', 'email', 'max:255', new UniqueEmailCheck($this->id , $this->model)],
            'phone' => ['required', 'numeric', new UniquePhoneCheck($this->id , $this->model), 'regex:/^(?:0|\(?\+994\)?\s?)[1-79](?:[\.\-\s]?\d\d){4}$/'],
            'serial_number' => ['required', 'max:9', new UniqueSerialNumberCheck($this->id , $this->model)],
            'citizenship' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'string', 'regex:/(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))/'],
            'gender' => ['required', 'numeric', new ExistsGender()],
            'fin' => ['required', 'min:7', 'max:7'],
            'address' => ['required', 'string', 'max:255'],
        ];
    }
}
