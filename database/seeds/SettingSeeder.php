<?php

use App\Country;
use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            Setting::FIELD_TAX_ORDER => 5, // is default
            Setting::FIELD_COMPANY_COUNTRY_ID => Country::first()->id,// is default
            Setting::FIELD_EMAIL => 'Shtormex.az@gmail.com',
            Setting::FIELD_PHONE => '781-349-6679',
            Setting::FIELD_MOBILE => '+998 50 988 11 25',
            Setting::FIELD_SOCIAL_FACEBOOK => '@facebook',
            Setting::FIELD_SOCIAL_GOOGLE_PLUS => '@google',
            Setting::FIELD_SOCIAL_INSTAGRAM => '@instagram',
            Setting::FIELD_SOCIAL_LINKEDIN_IN => '@linkedin',
            Setting::FIELD_SOCIAL_PINTEREST => '@pinterest',
            Setting::FIELD_SERVICE => 'write service',
            Setting::FIELD_ABOUT_US => 'about us',
            Setting::FIELD_LINK_GOOGLE_PLAY => 'link google play',
            Setting::FIELD_LINK_APP_STORE => 'link app store',
            Setting::FIELD_CONTACT_URL_MAP => 'https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed',
            Setting::FIELD_HOME_URL_VIDEO => 'https://www.youtube.com/embed/sb3yU2L5U7Y',
            Setting::FIELD_GATE_PAYTR_OR_PULPAL => Setting::GATE_PAYTR,
            Setting::FIELD_HAS_COURIERS_IN_PROJECT => 0,
            Setting::FIELD_MAX_WEIGHT => 10,
            Setting::FIELD_MAX_WEIGHT_PRICE => 20.10,
            Setting::FIELD_AREA_CODE => "+7",
            Setting::FIELD_COWSEL_TOKEN => "",
            Setting::FIELD_IS_CALCULATE_THE_WEIGHT => 0,
            Setting::FIELD_EXPORT_NAME => "",
            Setting::FIELD_EXPORT_ADDRESS => "",
            Setting::FIELD_COMPANY_FACTOR_ADDRESS => "company address",
            Setting::FIELD_COMPANY_FACTOR_PHONE => "company phone",
            Setting::FIELD_COMPANY_NAME => "company name",
            Setting::FIELD_COMPANY_POSTAL_CODE => "company postal code",
//            'ENV_mail.mailers.smtp.host' => "mail.shtormex.ru",
//            'ENV_mail.mailers.smtp.transport' => "smtp",
//            'ENV_mail.mailers.smtp.port' => 587,
//            'ENV_mail.mailers.smtp.encryption' => "tls",
//            'ENV_mail.mailers.smtp.username' => "info@shtormex.ru",
//            'ENV_mail.mailers.smtp.password' => "c?.LULyU^S}*",
        ];

        foreach ($settings as $index => $value) {
            Setting::firstOrCreate(
                ['key' => $index],
                ['value' => $value]
            );
        }
    }
}
