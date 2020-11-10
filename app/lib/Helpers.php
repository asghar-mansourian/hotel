<?php


namespace App\lib;


use App\Setting;

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
}
