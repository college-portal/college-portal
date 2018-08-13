<?php

namespace Tests\Feature;

use Tests\TestCase;
use CollegePortal\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SchoolTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/schools GET
     * 
     * should return a list of Schools
     *
     * @return void
     */
    public function testGetSchoolList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('schools'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'name',
                    'short_name',
                    'owner_id'
                ]
            ]
        ]);
    }

    /**
     * /api/schools/1 GET
     * 
     * should return a School
     *
     * @return void
     */
    public function testGetSchool()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('schools/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'name',
            'short_name',
            'owner_id'
        ]);
    }
    
    /**
     * /api/schools POST
     * 
     * should create a new School
     *
     * @return void
     */
    public function testCreateSchool()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('schools'), [
                            'name' => 'Tush College',
                            'short_name' => 'TUSHCOL',
                            'is_active' => 0
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'id',
            'name',
            'short_name',
            'owner_id'
        ]);

        $response->assertJson([
            'name' => 'Tush College'
        ]);
    }
    
    /**
     * /api/schools/1 PUT
     * 
     * should modify the School's name
     *
     * @return void
     */
    public function testUpdateSchool()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('schools/1'), [
                            'name' => 'Tux College'
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'name',
            'short_name',
            'owner_id'
        ]);

        $response->assertJson([
            'name' => 'Tux College'
        ]);
    }
    
    /**
     * /api/schools/1 DELETE
     * 
     * should delete the School
     *
     * @return void
     */
    public function testDeleteSchool()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('schools/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
