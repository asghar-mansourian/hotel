<?php

use App\Country;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    const regions = [
        'Baku'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::regions as $region) {
            if ($country = Country::getCompanyCountry()) {
                $country->regions()->updateOrCreate(
                    [
                        'name' => $region,

                    ]
                );
            }

        }
    }
}
