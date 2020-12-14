<?php

namespace App\Http\Requests\Member;

use App\Rules\ExistsPaymentType;
use Illuminate\Foundation\Http\FormRequest;

class BasketRequest extends FormRequest
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
            'country_id' => ['required', 'exists:countries,id'],
//            'branch_id' => ['required', 'exists:branches,id'],
            'description' => ['nullable'],
            'link' => 'required|array|min:1',
            'link.*' => ['required', 'url'],
            'price' => 'required|array|min:1',
            'price.*' => ['required', 'numeric', 'min:1'],
            /* 'has_cargo' => 'required|array|min:1',
             'has_cargo.*' => ['required', 'boolean'],
             'cargo' => 'required|array|min:1',*/
            'color' => 'required|array|min:1',
            'color.*' => ['required', 'string', 'min:1', 'max:255'],
            'quantity' => 'required|array|min:1',
            'quantity.*' => ['required', 'integer', 'min:1'],
            'specification' => 'required|array|min:1',
            'specification.*' => ['required', 'string', 'min:1', 'max:255'],
        ];
    }
}
