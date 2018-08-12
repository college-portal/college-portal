<?php

namespace Tests\Feature;

use Tests\TestCase;
use CollegePortal\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CourseDependencyTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/course-dependencies GET
     * 
     * should return a list of CourseDependencies
     *
     * @return void
     */
    public function testGetCourseDependencyList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('course-dependencies'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'course_id',
                    'dependency_id'
                ]
            ]
        ]);
    }

    /**
     * /api/course-dependencies/1 GET
     * 
     * should return a CourseDependency
     *
     * @return void
     */
    public function testGetCourseDependency()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('course-dependencies/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'course_id',
            'dependency_id'
        ]);
    }
    
    /**
     * /api/course-dependencies POST
     * 
     * should create a new CourseDependency
     *
     * @return void
     */
    public function testCreateCourseDependency()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('course-dependencies'), [
                            'course_id' => 8,
                            'dependency_id' => 7
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'course_id',
            'dependency_id'
        ]);

        $response->assertJson([
            'course_id' => 8
        ]);
    }
    
    /**
     * /api/course-dependencies/1 PUT
     * 
     * should modify the CourseDependency's name
     *
     * @return void
     */
    public function testUpdateCourseDependency()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('course-dependencies/1'), [
                            'course_id' => 5
                        ]);
                        
        $response->assertStatus(200);

        $response->assertJsonStructure([
            'course_id',
            'dependency_id'
        ]);

        $response->assertJson([
            'course_id' => 5
        ]);
    }
    
    /**
     * /api/course-dependencies/1 DELETE
     * 
     * should delete the CourseDependency
     *
     * @return void
     */
    public function testDeleteCourseDependency()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('course-dependencies/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
