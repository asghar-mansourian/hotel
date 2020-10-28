<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static getValue(string $Key)
 */
class Setting extends Model
{
    public $timestamps = false;

    const FIELD_TAX_ORDER = 'tax_order';
    const FIELD_COMPANY_COUNTRY_ID = 'company_country_id';

    public function scopeGetValue($query, $key)
    {
        return $query->where('key', $key)->value('value');
    }
}
