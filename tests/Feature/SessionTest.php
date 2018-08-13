<?php

namespace Tests\Feature;

use Tests\TestCase;
use CollegePortal\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SessionTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/sessions GET
     * 
     * should return a list of Sessions
     *
     * @return void
     */
    public function testGetSessionList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('sessions'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'name',
                    'school_id',
                    'start_date',
                    'end_date'
                ]
            ]
        ]);
    }

    /**
     * /api/sessions/1 GET
     * 
     * should return a Session
     *
     * @return void
     */
    public function testGetSession()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('sessions/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'name',
            'school_id',
            'start_date',
            'end_date'
        ]);
    }
    
    /**
     * /api/sessions POST
     * 
     * should create a new Session
     *
     * @return void
     */
    public function testCreateSession()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('sessions'), [
                            'school_id' => 1,
                            'name' => '2020/2021',
                            'start_date' => '2020-06-22',
                            'end_date' => '2021-06-22'
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'name',
            'school_id',
            'start_date',
            'end_date'
        ]);

        $response->assertJson([
            'name' => '2020/2021'
        ]);
    }
    
    /**
     * /api/sessions/1 PUT
     * 
     * should modify the Session's name
     *
     * @return void
     */
    public function testUpdateSession()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('sessions/1'), [
                            'name' => '2020-2021'
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'name',
            'school_id',
            'start_date',
            'end_date'
        ]);

        $response->assertJson([
            'name' => '2020-2021'
        ]);
    }
    
    /**
     * /api/sessions/1 DELETE
     * 
     * should delete the Session
     *
     * @return void
     */
    public function testDeleteSession()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('sessions/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
