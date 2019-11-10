<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    const URI = '/api/v1';

    const RESPONSE_401 = [
        'message'
    ];

    /**
     * Signing the user.
     * @param null $user
     * @return array
     */
    protected function signIn($user = null)
    {
        $user = $user ?: factory(User::class)->create();

        $credentials = [
            'email' => $user->email,
            'password' => 'password'
        ];

        $response = $this->json('POST', self::URI . '/auth/login', $credentials);

        $response_data = $response->decodeResponseJson();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'HTTP_Authorization' => 'Bearer ' . (string)$response_data['token'],
        ];

        $this->actingAs($user, 'api')
            ->withHeaders($headers);

        $this->assertAuthenticatedAs($user, 'api');

        return [
            'user' => $user,
            'token' => $response_data['token']
        ];
    }

    /**
     * Logout the user
     *
     * @param $user
     * @return void
     */
    protected function signOut($user)
    {
        $this->actingAs($user)
            ->json('POST', self::URI . '/auth/logout');

        $this->assertGuest();
    }
}
