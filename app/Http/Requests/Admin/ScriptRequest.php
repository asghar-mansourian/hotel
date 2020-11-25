<?php

namespace App\Http\Requests\Admin;

use App\Rules\JsFileCheck;
use Illuminate\Foundation\Http\FormRequest;

class ScriptRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'content' => ['nullable', 'max:2550'],
            'file' => ['nullable', new JsFileCheck(),'max:2048'],
            'status' => ['required'],

        ];
    }
}
