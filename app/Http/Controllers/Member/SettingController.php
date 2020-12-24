<?php

namespace App\Http\Controllers\Member;


use App\Branch;
use App\Country;
use App\Http\Controllers\Controller;
use App\lib\currency;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
        $branches = Branch::all();
        $countries = Country::all();

        return view('members.setting', compact('user' , 'branches' , 'countries'));
    }

    public function changeProfileInformation(Request $request)
    {
        $request->validate([
//            'name' => ['required', 'string', 'max:255'],
//            'family' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', Rule::unique('users')->ignore(\auth()->user()->id), 'regex:/(9)[0-9]{9}/'],
            'address' => ['required', 'string', 'max:255'],
            'region_id' => ['required', 'exists:regions,id'],
//            'birthdate' => ['required', 'string', 'regex:/(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))/'],
        ]);
        User::query()->where('id', Auth::user()->id)->update([
//            'birthdate' => $request->input('birthdate'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'region_id' => $request->input('region_id'),
//            'branch_id' => $request->input('branch_id'),
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
