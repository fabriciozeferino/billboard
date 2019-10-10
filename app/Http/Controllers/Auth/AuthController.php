<?php

namespace App\Http\Controllers\Auth;


use Auth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController
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
        $token = JWTAuth::getToken();

        try {
            $user = JWTAuth::toUser($token);

            return $this->respondWithToken($user, 200);

        } catch (TokenExpiredException $e) {

            return $this->unauthenticated('token_expired', 401, $e->getMessage());
        } catch (TokenInvalidException $e) {

            return $this->unauthenticated('token_invalid', 401, $e->getMessage());
        } catch (JWTException $e) {

            return $this->unauthenticated('token_absent', 401, $e->getMessage());
        }
    }
}
