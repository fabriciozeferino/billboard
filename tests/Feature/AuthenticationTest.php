<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class AuthenticationTest extends TestCase
{
    use withFaker, RefreshDatabase;

    /**  @test */
    public function register_page_displayed()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    /**  @test */
    public function a_user_can_register_and_authenticate()
    {
        $this->withoutExceptionHandling();

        $register_data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'secret123',
            'password_confirmation' => 'secret123'
        ];

        $response = $this->json('POST', '/api/v1/auth/register', $register_data);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'token',
            'user'
        ]);

        $response_data = $response->decodeResponseJson();

//dd($response_data);

        $user_instance = User::find($response_data['user']['id']);
        $this->assertAuthenticatedAs($user_instance);
    }

    /**  @test */
    public function login_page_displayed()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    /**  @test */
    public function a_user_can_login()
    {
        $user = factory(User::class)->create();

        $credentials = [
            'email' => $user->email,
            'password' => 'password'
        ];

        $response = $this->json('POST', '/api/v1/auth/login', $credentials, ['Accept' => 'application/json']);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'token',
            'user'
        ]);

        $this->assertAuthenticatedAs($user);
    }

    /**  @test */
    public function does_not_login_if_invalid_credential()
    {
        $user = factory(User::class)->create();

        $credentials = [
            'email' => $user->email,
            'password' => 'invalid'
        ];

        $response = $this->post('/api/v1/auth/login', $credentials);

        $response->assertStatus(401);
        $this->assertGuest();
    }

    /**  @test */
    public function a_authenticated_user_can_logout()
    {
        $this->signIn();

        $response = $this->post('/api/v1/auth/logout');
        $response->assertStatus(200);
        $this->assertGuest();
    }

    /**  @test */
    public function assert_route_check_token_works()
    {
        $data = $this->signIn();

        $token = $data['token'];

        $response = $this->json('POST', '/api/v1/auth/check-token', ['token' => $token]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'token',
            'user'
        ]);

        $this->assertAuthenticatedAs($data['user'], 'api');
    }
}
