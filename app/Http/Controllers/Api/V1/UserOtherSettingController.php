<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserSettingsResourceCollection as SettingResource;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserOtherSettingController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id)->get();
        return (new SettingResource($user))->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user= User::findOrFail($id)->first();

        $request->validate([
            'serial_number' => 'bail|required|string|max:255',
            'fin' => 'bail|required|string|max:255',
            'citizenship' => 'bail|required|string|max:255',
            'address' => 'bail|required|string|max:255',
            'gender' => 'required|numeric|string'
        ]);

        $user->serial_number = $request->input('serial_number');
        $user->fin = $request->input('fin');
        $user->citizenship = $request->input('citizenship');
        $user->address = $request->input('address');
        $user->gender = $request->input('gender');
        $user->save();

        return (new SettingResource($user))->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::whereId($id)->firstorfail()->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
