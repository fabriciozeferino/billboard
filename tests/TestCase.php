<?php

namespace Tests;

use App\User;
use Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected function signIn($user = null)
    {
        $user = $user ?: factory(User::class)->create();

        $credentials = [
            'email' => $user->email,
            'password' => 'password'
        ];

        $response = $this->json('POST', '/api/v1/auth/login', $credentials);

        $response_data = $response->decodeResponseJson();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'HTTP_Authorization' => 'Bearer ' . (string) $response_data['token'],
        ];

        $this->actingAs($user, 'api')
            ->withHeaders($headers);

        $this->assertAuthenticatedAs($user, 'api');

        return [
            'user' => $user,
            'token' => $response_data['token']
        ];
    }
}
