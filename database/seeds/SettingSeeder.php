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
            Setting::FIELD_MOBILE => '+998 50 988 11 25'
        ];

        foreach ($settings as $index => $value) {
            Setting::updateOrCreate(
                ['key' => $index],
                ['value' => $value]
            );
        }
    }
}
