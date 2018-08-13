<?php

namespace Tests\Feature;

use Tests\TestCase;
use CollegePortal\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StaffTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/staff GET
     * 
     * should return a list of Staff
     *
     * @return void
     */
    public function testGetStaffList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('staff'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'user_id',
                    'title',
                    'school_id',
                    'department_id'
                ]
            ]
        ]);
    }

    /**
     * /api/staff/1 GET
     * 
     * should return a Staff
     *
     * @return void
     */
    public function testGetStaff()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('staff/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'user_id',
            'title',
            'school_id',
            'department_id'
        ]);
    }
    
    /**
     * /api/staff POST
     * 
     * should create a new Staff
     *
     * @return void
     */
    public function testCreateStaff()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('staff'), [
                            'title' => 'Mr.',
                            'user_id' => 1,
                            'school_id' => 1,
                            'department_id' => 1
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'user_id',
            'title',
            'school_id',
            'department_id'
        ]);

        $response->assertJson([
            'title' => 'Mr.'
        ]);
    }
    
    /**
     * /api/staff/1 PUT
     * 
     * should modify the Staff's name
     *
     * @return void
     */
    public function testUpdateStaff()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('staff/1'), [
                            'title' => 'Mrs.'
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'user_id',
            'title',
            'school_id',
            'department_id'
        ]);

        $response->assertJson([
            'title' => 'Mrs.'
        ]);
    }
    
    /**
     * /api/staff/1 DELETE
     * 
     * should delete the Staff
     *
     * @return void
     */
    public function testDeleteStaff()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('staff/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
