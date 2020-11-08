<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TranslateSeeder extends Seeder
{
    public function __construct()
    {
        $this->groups = [
            'website' => $this->website_items,
            'member' => [],
            'admin' => [],
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->groups as $list => $group) {
            foreach ($group as $key => $item) {
                DB::table('ltm_translations')->updateOrInsert(
                    [
                        'locale' => $this->locale,
                        'group' => $list,
                        'key' => $key,
                        'value' => $item,
                    ],
                    [
                        'key' => $key,
                        'value' => $item,
                        'locale' => $this->locale,
                        'group' => $list,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
        }
    }


    private $locale = "en";

    private $website_items = [
        'ali' => 'book2',
        'book3' => 'book4',
    ];
}
