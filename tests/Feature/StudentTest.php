<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StudentTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/students GET
     * 
     * should return a list of Students
     *
     * @return void
     */
    public function testGetStudentList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('students'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'user_id',
                    'program_id',
                    'matric_no'
                ]
            ]
        ]);
    }

    /**
     * /api/students/1 GET
     * 
     * should return a Student
     *
     * @return void
     */
    public function testGetStudent()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('students/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'user_id',
            'program_id',
            'matric_no'
        ]);
    }
    
    /**
     * /api/students POST
     * 
     * should create a new Student
     *
     * @return void
     */
    public function testCreateStudent()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('students'), [
                            'user_id' => 1,
                            'matric_no' => 'UNI212',
                            'program_id' => 1
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'user_id',
            'program_id',
            'matric_no'
        ]);

        $response->assertJson([
            'matric_no' => 'UNI212'
        ]);
    }
    
    /**
     * /api/students/1 PUT
     * 
     * should modify the Student's name
     *
     * @return void
     */
    public function testUpdateStudent()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('students/1'), [
                            'matric_no' => 'UNI212'
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'user_id',
            'program_id',
            'matric_no'
        ]);

        $response->assertJson([
            'matric_no' => 'UNI212'
        ]);
    }
    
    /**
     * /api/students/1 DELETE
     * 
     * should delete the Student
     *
     * @return void
     */
    public function testDeleteStudent()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('students/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
