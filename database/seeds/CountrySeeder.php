<?php

use App\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    const countries = [
        'Turkey'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::countries as $country) {
            Country::updateOrCreate(
                [
                    'name' => $country,
                ]
            );
        }
    }
}
