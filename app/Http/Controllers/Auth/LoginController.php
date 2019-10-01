<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use Tymon\JWTAuth\Exceptions\JWTException;

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

        try {
            if (!$token = $this->guard()->attempt($credentials)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Username or Password incorrect'
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
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
        try {
            $this->guard()->invalidate();
            $this->guard()->logout();

            return response()->json([
                'status' => 'success',
                'message' => 'Logged out Successfully.'
            ], 200);

        } catch (JWTException $exception) {

            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage()
            ], 401);
        }
    }
}
