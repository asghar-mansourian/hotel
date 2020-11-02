<?php


namespace App\lib;


use Illuminate\Support\Str;

class Invoice
{
    public static function getStatusViaKey($key): string
    {
        return Str::of(\App\Invoice::STATUS_ALL[$key])
            ->replace('_', ' ')
            ->ucfirst();
    }
}
