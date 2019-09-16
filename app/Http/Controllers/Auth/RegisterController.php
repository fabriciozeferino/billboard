<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterUserRequest;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends AbstractAuth
{

    public function register(RegisterUserRequest $request)
    {
        // Create user
        $user = $this->create($request->validated());

        // Sign user in
        $user_token = $this->guard()->login($user);

        // Return Token
        return $this->respondWithToken($user_token, 201);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
