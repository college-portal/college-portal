<?php

namespace Tests\Feature;

use Tests\TestCase;
use CollegePortal\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProgramTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/programs GET
     * 
     * should return a list of Programs
     *
     * @return void
     */
    public function testGetProgramList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('programs'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'name',
                    'department_id'
                ]
            ]
        ]);
    }

    /**
     * /api/programs/1 GET
     * 
     * should return a Program
     *
     * @return void
     */
    public function testGetProgram()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('programs/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'name',
            'department_id'
        ]);
    }
    
    /**
     * /api/programs POST
     * 
     * should create a new Program
     *
     * @return void
     */
    public function testCreateProgram()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('programs'), [
                            'name' => 'Physical Science',
                            'department_id' => 1
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'id',
            'name',
            'department_id'
        ]);

        $response->assertJson([
            'name' => 'Physical Science'
        ]);
    }
    
    /**
     * /api/programs/1 PUT
     * 
     * should modify the Program's name
     *
     * @return void
     */
    public function testUpdateProgram()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('programs/1'), [
                            'name' => 'Information Systems'
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'name',
            'department_id'
        ]);

        $response->assertJson([
            'name' => 'Information Systems'
        ]);
    }
    
    /**
     * /api/programs/1 DELETE
     * 
     * should delete the Program
     *
     * @return void
     */
    public function testDeleteProgram()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('programs/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
