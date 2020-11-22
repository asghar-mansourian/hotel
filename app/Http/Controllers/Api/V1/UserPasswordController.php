<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserSettingsResourceCollection as SettingResource;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


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

        $request->validate([
            'current_password' => 'bail|required|string|min:8',
            'password' => 'bail|required|string|min:8|confirmed',
        ]);

        $user= User::findOrFail($id)->first();

        if (!Hash::check($request->current_password, $user->password)){
            return response()->json([
                'message' => 'current password is wrong'], 404);

        }

        $user->password = Hash::make($request->input('password'));

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
