<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserSettingsResourceCollection as SettingResource;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
//        $user = User::select('name','family','email','deliveryoffice','birthdate', 'email', 'phone')->paginate();
//        return (new SettingResource($user))->response();
    }



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
            'name' => 'bail|required|string|max:255',
            'family' => 'bail|required|string|max:255',
            'deliveryoffice' => 'bail|required|string|max:255',
            'birthdate' => 'bail|required|string|max:255',
            'email' => 'bail|required|string|max:255|email|unique:users,email',
            'phone' => 'required|numeric|unique:users|string'
        ]);

        $user->name = $request->input('name');
        $user->family = $request->input('family');
        $user->deliveryoffice = $request->input('deliveryoffice');
        $user->birthdate = $request->input('birthdate');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
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
