<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PriceItemRequest extends FormRequest
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
            'froms' => ['required', 'array', 'min:1'],
            'froms.*' => ['required'],
            'tos' => ['required', 'array', 'min:1'],
            'tos.*' => ['required'],
            'prices' => ['required', 'array', 'min:1'],
            'prices.*' => ['required'],

        ];
    }
}
