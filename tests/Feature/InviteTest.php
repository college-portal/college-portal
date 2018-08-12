<?php

namespace Tests\Feature;

use Tests\TestCase;
use CollegePortal\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InviteTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/invites GET
     * 
     * should return a list of Invites
     *
     * @return void
     */
    public function testGetInviteList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('invites'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'creator_id',
                    'school_id',
                    'email',
                    'message'
                ]
            ]
        ]);
    }

    /**
     * /api/invites/1 GET
     * 
     * should return a Invite
     *
     * @return void
     */
    public function testGetInvite()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('invites/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'creator_id',
            'school_id',
            'email',
            'message'
        ]);
    }
    
    /**
     * /api/invites POST
     * 
     * should create a new Invite
     *
     * @return void
     */
    public function testCreateInvite()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('invites'), [
                            'role_id' => 1,
                            'school_id' => 1,
                            'email' => 'invited.user.ii@mailinator.com',
                            'message' => 'Please come to my school'
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'id',
            'creator_id',
            'school_id',
            'email',
            'message'
        ]);

        $response->assertJson([
            'school_id' => 1,
            'email' => 'invited.user.ii@mailinator.com',
            'message' => 'Please come to my school'
        ]);
    }
    
    /**
     * /api/invites POST
     * 
     * should create a new Invite with multiple roles
     *
     * @return void
     */
    public function testCreateInviteWithMultipleRoles()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('invites'), [
                            'roles' => [
                                [
                                    'role_id' => 1
                                ],
                                [
                                    'role_id' => 2
                                ]
                            ],
                            'school_id' => 1,
                            'email' => 'invited.user.iii@mailinator.com',
                            'message' => 'Please come to my school'
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'id',
            'creator_id',
            'school_id',
            'email',
            'message'
        ]);

        $response->assertJson([
            'school_id' => 1,
            'email' => 'invited.user.iii@mailinator.com',
            'message' => 'Please come to my school'
        ]);
    }
    
    /**
     * /api/invites/1 PUT
     * 
     * should respond with unauthorized
     *
     * @return void
     */
    public function testUpdateInvite()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('invites/1'), [
                            'message' => 'Okay, do not come anymore'
                        ]);

        $response->assertStatus(403);
    }
    
    /**
     * /api/invites/1 PUT
     * 
     * should modify the invite
     *
     * @return void
     */
    public function testUpdateInviteWithCreatedUser()
    {

        $response = $this->loginAs($this->createUser([ 'email' => 'invited.user@mailinator.com' ]))
                        ->put($this->url('invites/1'), [
                            'message' => 'Okay, do not come anymore'
                        ]);

        $response->assertStatus(200);
    }
    
    /**
     * /api/invites/1 DELETE
     * 
     * should delete the Invite
     *
     * @return void
     */
    public function testDeleteInvite()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('invites/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
