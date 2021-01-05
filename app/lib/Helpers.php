<?php


namespace App\lib;


use App\Notification;
use App\Order;
use App\Setting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Helpers
{
    public static function getTaxOrder()
    {
        return Setting::getValue(Setting::FIELD_TAX_ORDER);
    }

    public static function getContent($content, $length = 70)
    {
        return html_entity_decode(mb_substr(strip_tags($content), 0, $length, "utf-8")) . ' ...';
    }

    public static function getLocales()
    {
        return \DB::table('ltm_translations')->select(\DB::raw("distinct(locale)"))->get();
    }

    public static function convertPriceToGatePulpal($price)
    {

//        if (!is_float($price)) {
//            $price = str_replace(',', '',
//                number_format($price, 2)
//            );
//        }
        $price = str_replace(',', '', number_format($price, 2));
        return str_replace('.', '', $price);
    }

    public static function upload($request, $customFieldRequest = null, $url = '/app/comment/')
    {
        $file = $customFieldRequest ? $customFieldRequest : $request->file;

        $file_name = Str::random(20) . $file->getClientOriginalName();
        $result = $file->move(storage_path() . $url, $file_name) ? $file_name : false;

        return $result;
    }

    public static function getCurrency($from, $to)
    {
        $currency = DB::table('currencies')
            ->where('from', $from)
            ->where('to', $to)
            ->first();
        return $currency->to_value ?? 0;
    }

    public static function getDefaultGate()
    {
        switch (Setting::getValue(Setting::FIELD_GATE_PAYTR_OR_PULPAL)) {
            case Setting::GATE_PAYTR:
                return Setting::GATE_PAYTR;
            case Setting::GATE_PULPAL:
                return Setting::GATE_PULPAL;
            default:
                return Setting::GATE_PAYMES;
        }
    }

    /**
     * @param $price
     * @return string
     */
    public static function formatPrice($price)
    {
        return number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $price)), 2);
    }

    /**
     * @param $statusKey
     * @return array|Application|Translator|string|null
     */
    public static function getStatusOrder($statusKey)
    {
        switch ($statusKey) {
            case Order::STATUS_ORDERED:
                return __('member.ordered');
            case Order::STATUS_PURCHASED:
                return __('member.purchased');
            case Order::STATUS_WAREHOUSE_ABROAD:
                return __('member.anbar');
            case Order::STATUS_FILL_IN_BOX:
                return __('member.fill_in_box');
            case Order::STATUS_ON_WAY:
                return __('member.Heisway');
            case Order::STATUS_CUSTOMS_INSPECTION:
                return __('member.Customsinspection');
            case Order::STATUS_IN_WAREHOUSE:
                return __('member.warehouse');
            case Order::STATUS_COURIER_DELIVERY:
                return __('member.courierdelivery');
            case Order::STATUS_COMPLETE:
                return __('member.complete');
            default:
                return '';
        }
    }

    public static function sendMessageWithId($users, $key)
    {
        $selectMessage = Notification::where('key', $key)->first();
        $sms = new sms();
        if (is_array($users)) {
            foreach ($users as $user) {
                $selectUser = \App\User::find($user);

                $sms->sendSmsWithLinex($selectMessage->value, $selectUser->phone);
            }
        } else {
            $selectUser = \App\User::find($users);
            $sms->sendSmsWithLinex($selectMessage->value, $selectUser->phone);

        }
    }
}
