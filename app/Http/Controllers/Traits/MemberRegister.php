<?php


namespace App\Http\Controllers\Traits;


use App\Rules\ExistsGender;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

trait MemberRegister
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'numeric', 'unique:users', 'regex:/^(?:0|\(?\+994\)?\s?)[1-79](?:[\.\-\s]?\d\d){4}$/'],
            'serial_number' => ['required', 'max:9', 'unique:users'],
            'citizenship' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'string', 'regex:/(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))/'],
            'gender' => ['required', 'numeric', new ExistsGender()],
            'fin' => ['required', 'min:7', 'max:7'],
            'address' => ['required', 'string', 'max:255'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'code' => $this->generateCode(),
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'serial_number' => $data['serial_number'],
            'citizenship' => $data['citizenship'],
            'birthdate' => $data['birthdate'],
            'gender' => $data['gender'],
            'fin' => $data['fin'],
            'address' => $data['address']
        ]);
    }

    private function generateCode()
    {
        do {
            $code = rand(00000000000, 99999999999);

            $exists = User::where('code', $code)->exists();

            if (!$exists) {
                return $code;
            }

        } while (!$exists);
    }
}
