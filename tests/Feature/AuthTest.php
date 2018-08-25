<?php

namespace Tests\Feature;

use CollegePortal\Models\User;
use CollegePortal\Models\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    /**
     * /api/auth POST
     * 
     * Bad credentials should 
     * - return 400
     * - return error message
     *
     * @return void
     */
    public function testAuthInvalidCredentials()
    {
        $response = $this->post($this->url('auth'), [
            'email' => 'username',
            'password' => 'password'
        ]);

        $response->assertStatus(400);
        $response->assertJson([
            'message' => 'invalid credentials'
        ]);
    }

    /**
     * /api/auth POST
     * 
     * Valid credentials should 
     * - return 200
     * - return token
     *
     * @return void
     */
    public function testAuthLogin()
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        $response = $this->post($this->url('auth'), [
            'email' => $email,
            'password' => $password
        ]);

        // should FAIL because email is not verified
        $response->assertStatus(403);

        $response->assertJsonStructure([
            'token'
        ]);
        
        // attempt email verification
        $token = $response->baseResponse->original['token'];

        $response = $this->post($this->url('auth/resend'), [], [
            'HTTP_Authorization' => "Bearer $token"
        ]);

        $response->assertStatus(200);

        $response->assertJson([
            'message' => 'verification mail sent'
        ]);
    }

    /**
     * /api/user GET
     * 
     * should 
     * - return 200
     * - return current user
     *
     * @return void
     */
    public function testAuthCurrentUser()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->json('GET', $this->url('user'));

        $response->assertStatus(200);

        $user = $this->findRoleUser(Role::ADMIN);

        $response->assertJson([
            'email' => $user->email
        ]);
    }
}
