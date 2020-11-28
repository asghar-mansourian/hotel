<?php

use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            "Type_One" => null, // is default
            "Type_Two" => null, // is default
            "Type_Three" => null, // is default
            "Type_Four" => null, // is default
            "Type_Five" => null, // is default
            "Type_Six" => null, // is default
            "Type_Seven" => null, // is default
        ];

        foreach ($settings as $index => $value) {
            \App\Notification::firstOrCreate(
                ['key' => $index],
                ['value' => $value]
            );
        }
    }
}
