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
            Setting::FIELD_COMPANY_COUNTRY_ID => Country::first()->id // is default
        ];

        foreach ($settings as $index => $value) {
            Setting::updateOrCreate(
                ['key' => $index],
                ['value' => $value]
            );
        }
    }
}
