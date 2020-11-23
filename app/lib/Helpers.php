<?php


namespace App\lib;


use App\Setting;
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

        if (!is_float($price)) {
            $price = str_replace(',', '',
                number_format($price, 2)
            );
        }

        return str_replace('.', '', $price);
    }
    public static function upload($request)
    {
        $file = $request->file;
        $file_name = Str::random(20).$file->getClientOriginalName();
        $result = $file->move(storage_path().'/app/comment/',$file_name)? $file_name: false;
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
}
