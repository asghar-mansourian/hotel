<?php

use App\Country;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    const branches = [
        'Baku'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::branches as $branch) {
            if ($country = Country::getCompanyCountry()) {
                if ($region = $country->regions->first()) {
                    $region->branches()->updateOrCreate(
                        [
                            'title' => $branch,
                        ]
                    );
                }
            }

        }
    }
}
