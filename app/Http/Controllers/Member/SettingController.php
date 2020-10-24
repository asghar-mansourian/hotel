<?php

namespace App\Http\Controllers\Member;


use App\Http\Controllers\Controller;
use App\lib\currency;
use App\Rules\ExistsGender;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('members.setting', compact('user'));
    }

    public function changeProfileInformation(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'family' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'string', 'regex:/(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))/'],
        ]);
        User::query()->where('id', Auth::user()->id)->update([
            'name' => $request->input('name'),
            'family' => $request->input('family'),
            'birthdate' => $request->input('birthdate'),
        ]);

        return redirect()->back()->with('success', 'Updated Profile Successful');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'current_password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::find(Auth::user()->id);
        if (Hash::check($request->input('current_password'), $user->password)) {

            $user->fill([
                'password' => Hash::make($request->input('password'))
            ])->save();
            return redirect()->back()->with('success', 'Updated Password Successful');

        } else {
            return redirect()->back()->with('error', 'Password does not match');
        }


    }

    public function changeOther(Request $request)
    {
        $request->validate([
//            'serial_number' => ['required', 'max:9', 'unique:users'],
            'citizenship' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'numeric', new ExistsGender()],
            'fin' => ['required', 'min:7', 'max:7'],
            'address' => ['required', 'string', 'max:255'],
        ]);
        User::query()->where('id', Auth::user()->id)->update([
//            'serial_number' => $request->input('serial_number'),
            'citizenship' => $request->input('citizenship'),
            'gender' => $request->input('gender'),
            'fin' => $request->input('fin'),
            'address' => $request->input('address'),
        ]);

        return redirect()->back()->with('success', 'Updated Profile Successful');
    }

    public function getCurrency(Request $request)
    {
        $from = $request['from'];
        $to = $request['to'];
        $currency = intval($request['currency']);


        $api = new currency();
        $api->get($from, $to, $currency);
    }
    public function getCurrencyOnce($id , $type)
    {
        $from = "USD";
        $to = $_GET['type'];
        $currency = intval($_GET['id']);



        $api = new currency();
        $api->get($from , $to , $currency);
    }
}
