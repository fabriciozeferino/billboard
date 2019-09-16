<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends AbstractAuth
{

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh(), 200);
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
        return $this->respondWithToken($token['token'], 200);
    }
}
