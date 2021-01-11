<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const groups = [
        'Admin',
        'Blog',
        'Box',
        'BoxItem',
        'Branch',
        'Calculator',
        'Contact',
        'Country',
        'CountryDetail',
        'Courier',
        'Customer',
        'Faq',
        'Home',
        'Inquiry',
        'Invoice',
        'Notification',
        'Order',
        'OrderItems',
        'Page',
        'Payment',
        'Permission',
        'PriceItem',
        'Region',
        'Role',
        'Script',
        'Setting',
        'SiteSetting',
        'Slider',
        'Stock',
        'Uploader',
        'Translate',
        'User',
    ];


    public function run()
    {

        foreach (self::groups as $group) {
            Permission::updateOrCreate(['name' => 'edit ' . $group, 'guard_name' => 'admin']);
            Permission::updateOrCreate(['name' => 'delete ' . $group, 'guard_name' => 'admin']);
            Permission::updateOrCreate(['name' => 'create ' . $group, 'guard_name' => 'admin']);
            Permission::updateOrCreate(['name' => 'read ' . $group, 'guard_name' => 'admin']);
        }
    }
}
