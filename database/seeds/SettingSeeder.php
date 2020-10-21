]<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    const settings = [
        'tax_order' => 5 // is default
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::settings as $index => $value) {
            Setting::updateOrCreate(
                ['key' => $index],
                ['value' => $value]
            );
        }
    }
}
