<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;

class AbstractAuth extends Controller
{
    /**
     * Return auth guard
     */
    public function guard()
    {
        return Auth::guard('api');
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     * @param $status
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token, $status)
    {
        return response()->json([
            'token' => $token,
            'user' => Auth::user()
        ], $status);
    }
}
