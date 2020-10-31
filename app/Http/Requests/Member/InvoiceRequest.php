<?php

namespace App\Http\Requests\Member;

use App\Rules\Member\FormatDate;
use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'shop' => ['required', 'string', 'min:3', 'max:255'],
            'product_type' => ['required', 'string', 'min:2', 'max:255'],
            'quantity' => ['required', 'numeric', 'min:1'],
            'price' => ['required', 'numeric', 'min:1'],
            'order_track' => ['required', 'numeric'],
            'order_date' => ['required', new FormatDate()],
            'branch_id' => ['required', 'exists:branches,id'],
            'country_id' => ['required', 'exists:countries,id'],
            'description' => ['nullable'],
        ];
    }
}
