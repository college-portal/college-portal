<?php

namespace Tests\Feature;

use Tests\TestCase;
use CollegePortal\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DepartmentTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/departments GET
     * 
     * should return a list of Departments
     *
     * @return void
     */
    public function testGetDepartmentList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('departments'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'name',
                    'hod_id',
                    'faculty_id'
                ]
            ]
        ]);
    }

    /**
     * /api/departments/1 GET
     * 
     * should return a Department
     *
     * @return void
     */
    public function testGetDepartment()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('departments/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'name',
            'hod_id',
            'faculty_id'
        ]);
    }
    
    /**
     * /api/departments POST
     * 
     * should create a new Department
     *
     * @return void
     */
    public function testCreateDepartment()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('departments'), [
                            'name' => 'Logic and Design',
                            'hod_id' => 1,
                            'faculty_id' => 1
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'id',
            'name',
            'hod_id',
            'faculty_id'
        ]);

        $response->assertJson([
            'name' => 'Logic and Design'
        ]);
    }
    
    /**
     * /api/departments/1 PUT
     * 
     * should modify the Department's name
     *
     * @return void
     */
    public function testUpdateDepartment()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('departments/1'), [
                            'name' => 'Computer Science and Mathematics'
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'name',
            'hod_id',
            'faculty_id'
        ]);

        $response->assertJson([
            'name' => 'Computer Science and Mathematics'
        ]);
    }
    
    /**
     * /api/departments/1 DELETE
     * 
     * should delete the Department
     *
     * @return void
     */
    public function testDeleteDepartment()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('departments/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
