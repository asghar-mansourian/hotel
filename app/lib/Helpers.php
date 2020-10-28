<?php


namespace App\lib;


use App\Setting;

class Helpers
{
    public static function getTaxOrder()
    {
        return Setting::getValue(Setting::FIELD_TAX_ORDER);
    }
}
