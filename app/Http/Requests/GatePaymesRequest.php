<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GatePaymesRequest extends FormRequest
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
            'card-number' => 'required|size:4',
            'card-number-1' => 'required|size:4',
            'card-number-2' => 'required|size:4',
            'card-number-3' => 'required|size:4',
            'holder' => 'required|min:3',
            'expMonth' => 'required',
            'expYear' => 'required',
            'cvv' => 'required|size:3',
            'payment_id' => 'required|exists:payments,id',
        ];
    }
}
