<?php

namespace Tests\Feature;

use Tests\TestCase;
use CollegePortal\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CourseTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/courses GET
     * 
     * should return a list of Courses
     *
     * @return void
     */
    public function testGetCourseList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('courses'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'title',
                    'code',
                    'credit'
                ]
            ]
        ]);
    }

    /**
     * /api/courses/1 GET
     * 
     * should return a Course
     *
     * @return void
     */
    public function testGetCourse()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('courses/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'title',
            'code',
            'credit'
        ]);
    }
    
    /**
     * /api/courses POST
     * 
     * should create a new Course
     *
     * @return void
     */
    public function testCreateCourse()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('courses'), [
                            'department_id' => 1,
                            'semester_type_id' => 1,
                            'level_id' => 2,
                            'code' => 'XAF181',
                            'title' => 'Laws of Biochemistry',
                            'credit' => 2
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'title',
            'code',
            'credit'
        ]);

        $response->assertJson([
            'title' => 'Laws of Biochemistry'
        ]);
    }
    
    /**
     * /api/courses/1 PUT
     * 
     * should modify the Course's name
     *
     * @return void
     */
    public function testUpdateCourse()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('courses/1'), [
                            'title' => 'Tenets of Biochemistry'
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'title',
            'code',
            'credit'
        ]);

        $response->assertJson([
            'title' => 'Tenets of Biochemistry'
        ]);
    }
    
    /**
     * /api/courses/1 DELETE
     * 
     * should delete the Course
     *
     * @return void
     */
    public function testDeleteCourse()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('courses/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
