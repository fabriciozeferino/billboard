<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;

class LoginController extends AbstractAuth
{
    /**
     * Get a JWT via given credentials.
     *
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = $this->guard()->attempt($credentials)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Username or Password incorrect'
            ], 401);
        }

        return $this->respondWithToken($token, 200);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json([
            'status' => 'success',
            'message' => 'Logged out Successfully.'
        ], 200);
    }
}
