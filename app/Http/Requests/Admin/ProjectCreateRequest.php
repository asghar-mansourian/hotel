<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProjectCreateRequest extends FormRequest
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
            'name' => 'required',
            'name_ru' => 'required',
            'name_az' => 'required',
            'title' => 'required',
            'title_ru' => 'required',
            'title_az' => 'required',
            'description' => 'required',
            'description_ru' => 'required',
            'description_az' => 'required',
            'telephone' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'address_ru' => 'required',
            'address_az' => 'required',
            'status' => 'required',
            'google_map_address' => 'required',
            'indicator_picture' => 'required|image',
            'up_indicator_picture' => 'required|image'
        ];
    }
}
