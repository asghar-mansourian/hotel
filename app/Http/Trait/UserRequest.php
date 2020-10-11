<?php

namespace App\Http\Controllers\Admin\traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

trait UserRequest{

    public function UserStoreInsert($request)
    {
        DB::table('users')->insert([
            'name' => $request->input('name'),
            'family' => $request->input('family'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'status' => $request->input('status'),
        ]);
    }

    public function UserUpdateEdit($request , $id)
    {
        DB::table('users')
            ->where('id' , $id)
            ->update([
            'name' => $request->input('name'),
            'family' => $request->input('family'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'status' => $request->input('status'),
        ]);
    }





}
