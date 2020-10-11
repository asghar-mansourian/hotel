<?php

namespace App\Http\Controllers\Admin\traits;

use Illuminate\Support\Facades\Validator;

trait ValidatorUserRequest{

    public function UserValidate()
    {
        $rules = [
            'name' => 'required|max:100',
            'family' => 'required|max:100',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'image' => 'required',
            'email' => 'required',
            'status' => 'required|max:400',
        ];
        return $rules;
    }

    public function validateRules($rules ,$request)
    {
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()->all(),
                'keys' => $validator->messages()->keys()
            ], 400);
        }
        else
        {
            return null;
        }

    }

}
