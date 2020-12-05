<?php


namespace App\Http\Controllers\Traits;


use App\lib\Helpers;
use App\Payment;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

trait TokenViaPaytr
{
    public function getToken($payment)
    {
        $merchant_id = config('payment.merchant_id');
        $merchant_key = config('payment.merchant_key');
        $merchant_salt = config('payment.merchant_salt');

        $email = auth()->user()->email;
        $payment_amount = Helpers::convertPriceToGatePulpal($payment->price);
        $merchant_oid = $payment->id;
        $user_name = auth()->user()->fullName;
        $user_address = auth()->user()->address;
        $user_phone = auth()->user()->phone;
        $merchant_ok_url = url('/payment/callback?success=1');
        $merchant_fail_url = url('/payment/callback?fail=1');
        $user_basket = base64_encode(json_encode(array(
            array("Order", $payment->price, $payment->id)
        )));

        $user_ip = request()->ip();
        $timeout_limit = config('payment.timeout_limit');
        $debug_on = config('payment.debug_on');
        $test_mode = config('payment.test_mode');
        $no_installment = config('payment.no_installment');
        $max_installment = config('payment.max_installment');
        $currency = config('payment.currency.' . Str::upper(Payment::PAYMENT_TYPE_BALANCE_TYPES[$payment->balance_type]));


        $hash_str = $merchant_id . $user_ip . $merchant_oid . $email . $payment_amount . $user_basket . $no_installment . $max_installment . $currency . $test_mode;
        $paytr_token = base64_encode(hash_hmac('sha256', $hash_str . $merchant_salt, $merchant_key, true));
        $post_vals = array(
            'merchant_id' => $merchant_id,
            'user_ip' => $user_ip,
            'merchant_oid' => $merchant_oid,
            'email' => $email,
            'payment_amount' => $payment_amount,
            'paytr_token' => $paytr_token,
            'user_basket' => $user_basket,
            'debug_on' => $debug_on,
            'no_installment' => $no_installment,
            'max_installment' => $max_installment,
            'user_name' => $user_name,
            'user_address' => $user_address,
            'user_phone' => $user_phone,
            'merchant_ok_url' => $merchant_ok_url,
            'merchant_fail_url' => $merchant_fail_url,
            'timeout_limit' => $timeout_limit,
            'currency' => $currency,
            'test_mode' => $test_mode
        );

        try {
            $result = Http::asForm()
                ->post(config('payment.url'), $post_vals)
                ->object();
        } catch (Exception $exception) {
            return false;
        }

        if ($result->status !== 'success') {
            return false;
        }

        return $result->token;
    }
}
