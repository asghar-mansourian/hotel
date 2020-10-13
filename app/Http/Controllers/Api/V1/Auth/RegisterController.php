<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Rules\ExistsGender;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('members.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
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
