<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Support\Facades\Validator;

trait ValidatorRequest
{

    public function validateRules($rules, $request)
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
