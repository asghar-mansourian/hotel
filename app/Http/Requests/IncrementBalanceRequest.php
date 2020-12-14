<?php

namespace App\Http\Requests;

use App\Rules\incrementBalance;
use Illuminate\Foundation\Http\FormRequest;

class IncrementBalanceRequest extends FormRequest
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
            'amount_tl' => ['numeric','min:1'],
            'amount_usd' => ['numeric','min:1'],
        ];
    }
}
