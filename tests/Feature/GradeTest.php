<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GradeTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/grades GET
     * 
     * should return a list of Grades
     *
     * @return void
     */
    public function testGetGradeList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('grades'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'student_takes_course_id',
                    'score',
                    'description'
                ]
            ]
        ]);
    }

    /**
     * /api/grades/1 GET
     * 
     * should return a Grade
     *
     * @return void
     */
    public function testGetGrade()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('grades/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'student_takes_course_id',
            'score',
            'description'
        ]);
    }
    
    /**
     * /api/grades POST
     * 
     * should create a new Grade
     *
     * @return void
     */
    public function testCreateGrade()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('grades'), [
                            'student_takes_course_id' => 1,
                            'score' => 32,
                            'description' => 'CA Test'
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'id',
            'student_takes_course_id',
            'score',
            'description'
        ]);

        $response->assertJson([
            'score' => 32
        ]);
    }
    
    /**
     * /api/grades/1 PUT
     * 
     * should modify the Grade's name
     *
     * @return void
     */
    public function testUpdateGrade()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('grades/1'), [
                            'description' => 'Exams'
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'student_takes_course_id',
            'score',
            'description'
        ]);

        $response->assertJson([
            'description' => 'Exams'
        ]);
    }
    
    /**
     * /api/grades/1 DELETE
     * 
     * should delete the Grade
     *
     * @return void
     */
    public function testDeleteGrade()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('grades/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
