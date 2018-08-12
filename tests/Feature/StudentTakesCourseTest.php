<?php

namespace Tests\Feature;

use Tests\TestCase;
use CollegePortal\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StudentTakesCourseTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/student-courses GET
     * 
     * should return a list of StudentTakesCourses
     *
     * @return void
     */
    public function testGetStudentTakesCourseList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('student-courses'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'student_id',
                    'staff_teach_course_id'
                ]
            ]
        ]);
    }

    /**
     * /api/student-courses/1 GET
     * 
     * should return a StudentTakesCourse
     *
     * @return void
     */
    public function testGetStudentTakesCourse()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('student-courses/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'student_id',
            'staff_teach_course_id'
        ]);
    }
    
    /**
     * /api/student-courses POST
     * 
     * should create a new StudentTakesCourse
     *
     * @return void
     */
    public function testCreateStudentTakesCourse()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('student-courses'), [
                            'student_id' => 2,
                            'staff_teach_course_id' => 1
                        ]);
                        
        $response->assertStatus(201);

        $response->assertJsonStructure([
            'student_id',
            'staff_teach_course_id'
        ]);

        $response->assertJson([
            'student_id' => 2,
            'staff_teach_course_id' => 1
        ]);
    }
    
    /**
     * /api/student-courses/1 PUT
     * 
     * should modify the StudentTakesCourse's name
     *
     * @return void
     */
    public function testUpdateStudentTakesCourse()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('student-courses/1'), [
                            'student_id' => 3
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'student_id',
            'staff_teach_course_id'
        ]);

        $response->assertJson([
            'student_id' => 3
        ]);
    }
    
    /**
     * /api/student-courses/1 DELETE
     * 
     * should delete the StudentTakesCourse
     *
     * @return void
     */
    public function testDeleteStudentTakesCourse()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('student-courses/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
