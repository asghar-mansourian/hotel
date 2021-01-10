<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::updateOrCreate(
            [
                'email' => 'admin@gmail.com',
            ],
            [
                'name' => 'Main ',
                'family' => 'Admin',
                'password' => bcrypt('123456789'),
                'status' => 1,
                'is_admin' => 1
            ]
        );
    }
}
