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
        ];

        foreach ($settings as $index => $value) {
            Setting::firstOrCreate(
                ['key' => $index],
                ['value' => $value]
            );
        }
    }
}
