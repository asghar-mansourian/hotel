<?php

namespace App\Rules;

use App\Order;
use Illuminate\Contracts\Validation\Rule;

class ExistsPaymentType implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $key)
    {
        return array_key_exists($key, Order::PAYMENT_TYPE_ALL);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Payment Type not exists';
    }
}
