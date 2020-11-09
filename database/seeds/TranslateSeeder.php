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
        'pricing' => 'pricing',
        'howwework' => 'how we work',
        'faq' => 'faq',
        'blog' => 'blog',
        'contact' => 'contact',
        'login' => 'login',
        'register' => 'register',
        'dashboard' => 'dashboard',
        'setting' => 'setting',
        'settings' => 'settings',
        'order' => 'order',
        'orders' => 'orders',
        'invoices' => 'invoices',
        'invoice' => 'invoice',
        'balance' => 'balance',
        'logout' => 'logout',
        'transport' => 'transport',
        'subtitle2' => 'Global turkey logistics and transportation',
        'subtitle1' => 'services via sea, land and air.',
        'shipping' => 'shipping',
        'fee' => 'fee',
        'calculator' => 'calculator',
    ];
}
