<?php

namespace Tests\Feature;

use Tests\TestCase;
use CollegePortal\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/users GET
     * 
     * should return a list of Users
     *
     * @return void
     */
    public function testGetUserList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('users'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'first_name',
                    'last_name'
                ]
            ]
        ]);
    }

    /**
     * /api/users/1 GET
     * 
     * should return a User
     *
     * @return void
     */
    public function testGetUser()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('users/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'first_name',
            'last_name'
        ]);
    }
    
    /**
     * /api/users POST
     * 
     * should create a new User
     *
     * @return void
     */
    public function testCreateUser()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('users'), [
                            'first_name' => 'Stella',
                            'last_name' => 'Stevens',
                            'email' => 'stella.stevens@mailinator.com',
                            'password' => 'secret',
                            'dob' => '1967-12-18'
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'first_name',
            'last_name'
        ]);

        $response->assertJson([
            'first_name' => 'Stella'
        ]);
    }
    
    /**
     * /api/users/1 PUT
     * 
     * should modify the User's name
     *
     * @return void
     */
    public function testUpdateUser()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('users/1'), [
                            'first_name' => 'Jessica'
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'first_name',
            'last_name'
        ]);

        $response->assertJson([
            'first_name' => 'Jessica'
        ]);
    }
    
    /**
     * /api/users/1 DELETE
     * 
     * should delete the User
     *
     * @return void
     */
    public function testDeleteUser()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('users/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
