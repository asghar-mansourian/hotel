<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static getValue(string $Key)
 */
class Setting extends Model
{
    public $timestamps = false;
    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['id', 'key', 'value'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';

    const FIELD_TAX_ORDER = 'tax_order';
    const FIELD_COMPANY_COUNTRY_ID = 'company_country_id';
    const FIELD_EMAIL = 'email';
    const FIELD_PHONE = 'phone';
    const FIELD_MOBILE = 'mobile';

    public function scopeGetValue($query, $key)
    {
        return $query->where('key', $key)->value('value') ?? '';
    }
}
