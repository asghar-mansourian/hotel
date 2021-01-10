<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);

        $this->call(UserSeeder::class);

        $this->call(CountrySeeder::class);

        $this->call(SettingSeeder::class);

        $this->call(RegionSeeder::class);

        $this->call(BranchSeeder::class);

//        $this->call(TranslateSeeder::class);

        $this->call(UnitSeeder::class);

        $this->call(NotificationSeeder::class);

        $this->call(CurrencyCodeSeeder::class);

        $this->call(ProductCategorySeeder::class);

        $this->call(PermissionSeeder::Class);
    }
}
