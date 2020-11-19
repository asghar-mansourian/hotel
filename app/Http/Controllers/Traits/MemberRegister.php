<?php


namespace App\Http\Controllers\Traits;


use App\Rules\ExistsGender;
use App\Rules\Member\FormatDate;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

trait MemberRegister
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'family' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'numeric', 'unique:users', 'regex:/^(?:0|\(?\+994\)?\s?)[1-79](?:[\.\-\s]?\d\d){4}$/'],
            'serial_number' => ['required', 'max:9', 'unique:users'],
            'citizenship' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'string', new FormatDate()],
            'gender' => ['required', 'numeric', new ExistsGender()],
//            'fin' => ['required', 'min:7', 'max:7'],
            'address' => ['required', 'string', 'max:255'],
            'terms' => ['required'],
            'country_id' => ['required'],
            'region_id' => ['required'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'code' => $this->generateCode(),
            'name' => $data['name'],
            'family' => $data['family'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'serial_number' => $data['serial_number'],
            'citizenship' => $data['citizenship'],
            'birthdate' => $data['birthdate'],
            'gender' => $data['gender'],
//            'fin' => $data['fin'],
            'fin' => 1,
            'address' => $data['address'],
            'country_id' => $data['country_id'],
            'region_id' => $data['region-id']
        ]);

    }

    private function generateCode()
    {
        do {
            $code = rand(00000, 99999);

            $exists = User::where('code', $code)->exists();

            if (!$exists) {
                return $code;
            }

        } while (!$exists);
    }
}
