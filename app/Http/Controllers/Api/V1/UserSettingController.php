<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserSettingsResourceCollection as SettingResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserSettingController extends Controller
{


    public function show()
    {
        $user= auth()->user();
        return (new SettingResource($user))->response();
    }

    public function update(Request $request)
    {
        $user= auth()->user();
        $request->validate([
            'name' => 'bail|required|string|max:255',
            'family' => 'bail|required|string|max:255',
//            'branch_id' => 'bail|required|string|max:255',
            'birthdate' => 'bail|required|string|max:255',
            'region_id' => 'bail|required|numeric|max:200',
            'email' => 'bail|required|string|max:255|email|unique:users,email',
            'phone' => 'required|numeric|unique:users|string',
//            'serial_number' => 'bail|required|string|max:255',
            'fin' => 'bail|required|string|max:255',
//            'citizenship' => 'bail|required|string|max:255',
            'address' => 'bail|required|string|max:255',
//            'gender' => 'required|numeric|string'
        ]);

        $user->name = $request->input('name');
        $user->family = $request->input('family');
//        $user->branch_id = $request->input('branch_id');
        $user->region_id = $request->input('region_id');
        $user->birthdate = $request->input('birthdate');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->update();

        return (new SettingResource($user))->response();
    }

    public function updatePassword(Request $request)
    {
        $user= auth()->user();
        $request->validate([
            'current_password' => 'bail|required|string|min:8',
            'password' => 'bail|required|string|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)){
            return response()->json([
                'message' => 'current password is wrong'], 404);

        }

        $user->password = Hash::make($request->input('password'));

        $user->update();

        return (new SettingResource($user))->response();
    }

    public function destroy()
    {
        auth()->user()->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
