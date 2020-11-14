<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->units as $unit) {
            DB::table('units')
                ->updateOrInsert(['title' => $unit], [
                    'title' => $unit,
                ]);
        }
    }

    private $units = ['kg', 'gr'];
}
