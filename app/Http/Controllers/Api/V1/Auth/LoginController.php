<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Cowsel\Balance;
use App\Http\Controllers\Cowsel\Customer as CowselCustomer;
use App\Http\Controllers\Traits\MemberResponseToken;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    use MemberResponseToken;

    /**
     * Get a JWT via given credentials.
     *
     * @return JsonResponse
     */
    public function login()
    {
        request()->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        (new CowselCustomer())->login(auth()->user());

        (new Balance())->syncBalancesOfCowsel(auth()->user());

        (new Balance())->storeUSDPaymentsOfCowsel();


        return $this->respondWithToken($token, 'Login Successfully');
    }

    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh(), 'Refreshed Token');
    }
}
