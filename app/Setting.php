<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static getValue(string $Key)
 * @method static where(string $key, string $value)
 */
class Setting extends Model
{
    const  paginateNumber = 100;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['id', 'key', 'value'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';

    const GATE_PAYTR = 1;
    const GATE_PULPAL = 0;

    const FIELD_TAX_ORDER = 'tax_order';
    const FIELD_COMPANY_COUNTRY_ID = 'company_country_id';
    const FIELD_EMAIL = 'email';
    const FIELD_PHONE = 'phone';
    const FIELD_MOBILE = 'mobile';
    const FIELD_SOCIAL_FACEBOOK = 'social_facebook';
    const FIELD_SOCIAL_GOOGLE_PLUS = 'social_google_plus';
    const FIELD_SOCIAL_INSTAGRAM = 'social_instagram';
    const FIELD_SOCIAL_LINKEDIN_IN = 'social_linkedin_in';
    const FIELD_SOCIAL_PINTEREST = 'social_pinterest';
    const FIELD_SOCIAL_TELEGRAM = 'social_telegram';
    const FIELD_SOCIAL_WHATSUP = 'social_whatsup';
    const FIELD_SERVICE = 'service';
    const FIELD_ABOUT_US = 'about_us';
    const FIELD_LINK_GOOGLE_PLAY = 'link_google_play';
    const FIELD_LINK_APP_STORE = 'link_app_store';
    const FIELD_CONTACT_URL_MAP = 'contact_url_map';
    const FIELD_HOME_URL_VIDEO = 'home_url_video';
    const FIELD_GATE_PAYTR_OR_PULPAL = 'gate_bank_paytr_or_pulpal';
    const FIELD_HAS_COURIERS_IN_PROJECT = 'has_couriers_in_project';
    const FIELD_MAX_WEIGHT = 'max_weight';
    const FIELD_MAX_WEIGHT_PRICE = 'max_weight_price';
    const FIELD_AREA_CODE = 'area_code';
    const FIELD_COWSEL_TOKEN = 'cowsel_token';

    public function scopeGetValue($query, $key)
    {
        return $query->where('key', $key)->value('value') ?? '';
    }
    public $timestamps = false;

}
