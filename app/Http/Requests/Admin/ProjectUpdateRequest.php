<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
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
            'new_indicator_picture' => 'nullable|image',
            'new_up_indicator_picture' => 'nullable|image',
            'new_small_index_picture' => 'nullable|image',
            'min_address' => 'required',
            'min_address_ru' => 'required',
            'min_address_az' => 'required',
            'walk' => 'required',
            'walk_ru' => 'required',
            'walk_az' => 'required',
            'empty_room' => 'required',
            'empty_room_ru' => 'required',
            'empty_room_az' => 'required',
        ];
    }
}
