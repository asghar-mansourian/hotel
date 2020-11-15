<?php


namespace App\lib;


use App\Setting;
use Illuminate\Support\Facades\DB;

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

        if (!is_float($price)) {
            $price = str_replace(',', '',
                number_format($price, 2)
            );
        }

        return str_replace('.', '', $price);
    }

    public static function getCurrency($from, $to)
    {
        $currency = DB::table('currencies')
            ->where('from', $from)
            ->where('to', $to)
            ->first();
        return $currency->to_value ?? 0;
    }
}
