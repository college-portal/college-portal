<?php

namespace Tests\Feature;

use Tests\TestCase;
use CollegePortal\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StaffTeachCourseTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/staff-courses GET
     * 
     * should return a list of StaffTeachCourses
     *
     * @return void
     */
    public function testGetStaffTeachCourseList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('staff-courses'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'staff_id',
                    'course_id',
                    'semester_id'
                ]
            ]
        ]);
    }

    /**
     * /api/staff-courses/1 GET
     * 
     * should return a StaffTeachCourse
     *
     * @return void
     */
    public function testGetStaffTeachCourse()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('staff-courses/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'staff_id',
            'course_id',
            'semester_id'
        ]);
    }
    
    /**
     * /api/staff-courses POST
     * 
     * should create a new StaffTeachCourse
     *
     * @return void
     */
    public function testCreateStaffTeachCourse()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('staff-courses'), [
                            'staff_id' => 1,
                            'course_id' => 2,
                            'semester_id' => 1
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'staff_id',
            'course_id',
            'semester_id'
        ]);

        $response->assertJson([
            'staff_id' => 1,
            'course_id' => 2,
            'semester_id' => 1
        ]);
    }
    
    /**
     * /api/staff-courses/1 PUT
     * 
     * should modify the StaffTeachCourse's name
     *
     * @return void
     */
    public function testUpdateStaffTeachCourse()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('staff-courses/1'), [
                            'course_id' => 3,
                            'semester_id' => 2
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'staff_id',
            'course_id',
            'semester_id'
        ]);

        $response->assertJson([
            'course_id' => 3,
            'semester_id' => 2
        ]);
    }
    
    /**
     * /api/staff-courses/1 DELETE
     * 
     * should delete the StaffTeachCourse
     *
     * @return void
     */
    public function testDeleteStaffTeachCourse()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('staff-courses/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
