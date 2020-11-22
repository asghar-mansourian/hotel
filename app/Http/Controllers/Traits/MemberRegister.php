<?php


namespace App\Http\Controllers\Traits;


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
            'phone' => ['required', 'unique:users', 'max:14'],
//            'serial_number' => ['required', 'max:9', 'unique:users'],
//            'citizenship' => ['required', 'string', 'max:255'],
//            'birthdate' => ['required', 'string', new FormatDate()],
//            'gender' => ['required', 'numeric', new ExistsGender()],
//            'fin' => ['required', 'min:7', 'max:7'],
            'address' => ['required', 'string', 'max:255'],
            'terms' => ['required'],
            'region_id' => ['required', 'exists:regions,id'],
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
            'serial_number' => $data['serial_number'] ?? time(),
            'citizenship' => $data['citizenship'] ?? '',
            'birthdate' => $data['birthdate'] ?? '',
            'gender' => $data['gender'] ?? User::GENDER_MAN,
            'fin' => $data['fin'],
            'address' => $data['address'],
            'region_id' => $data['region_id']
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
