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
            "Notification_Pattern_Status_Purchased" => null, // is default
            "Notification_Pattern_Status_Warehouse_Abroad" => null, // is default
            "Notification_Pattern_Status_On_Way" => null, // is default
            "Notification_Pattern_Status_in_Warehouse" => null, // is default
            "Notification_Pattern_Status_Courier_Delivery" => null, // is default
            "Notification_Pattern_Status_Cancel" => null, // is default
            "Notification_Pattern" => null, // is default
        ];

        foreach ($settings as $index => $value) {
            \App\Notification::firstOrCreate(
                ['key' => $index],
                ['value' => $value]
            );
        }
    }
}
