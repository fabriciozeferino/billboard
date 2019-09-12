<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Auth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    /**
     * Get a JWT via given credentials.
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = $this->guard()->attempt($credentials)) {
            return response()->json([
                'status' => 'Username or Password incorrect'
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Return auth guard
     */
    private function guard()
    {
        return Auth::guard('api');
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {

        return response()->json([
            'token' => $token,
            'user' => Auth::user()
        ], 200);
    }

    public function loginUserWithToken($token)
    {
        //$this->guard()->loginUsingId($credentials)

        return $this->respondWithToken($token);
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

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkToken(Request $request)
    {
        $token = $request->only('token');

        try {

            if (!JWTAuth::parseToken()->authenticate()) {
                return response()->json(['token_invalid'], 401);
            }

        } catch (TokenExpiredException $e) {

            return response()->json('token_expired', 401);

        } catch (TokenInvalidException $e) {

            return response()->json($e->getMessage(), 401);

        } catch (JWTException $e) {

            return response()->json('token_absent', 401);

        }

        //TODO : refresh token when refresh page $this->guard()->refresh()
        return $this->respondWithToken($token);
    }
}
