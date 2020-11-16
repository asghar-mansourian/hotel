<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class InquiryRequest extends FormRequest
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
            'title' => 'nullable|string',
            'file' => 'nullable|image',
            'message' => 'required|string',
            'parent_id' => 'nullable|integer'
        ];
    }
}
