<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            [
                'email' => 'user@gmail.com',
                'phone' => '0123456789'
            ],
            [
                'name' => 'Main User',
                'password' => bcrypt('123456789'),
                'serial_number' => '123456789',
                'citizenship' => 'Iran',
                'birthdate' => '1398/12/20',
                'gender' => User::GENDER_MAN,
                'fin' => '12345678',
                'address' => 'Tabriz',
            ]
        );
    }
}
