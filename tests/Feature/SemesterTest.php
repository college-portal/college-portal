<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SemesterTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/semesters GET
     * 
     * should return a list of Semesters
     *
     * @return void
     */
    public function testGetSemesterList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('semesters'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'semester_type_id',
                    'session_id',
                    'start_date',
                    'end_date'
                ]
            ]
        ]);
    }

    /**
     * /api/semesters/1 GET
     * 
     * should return a Semester
     *
     * @return void
     */
    public function testGetSemester()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('semesters/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'semester_type_id',
            'session_id',
            'start_date',
            'end_date'
        ]);
    }
    
    /**
     * /api/semesters POST
     * 
     * should create a new Semester
     *
     * @return void
     */
    public function testCreateSemester()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('semesters'), [
                            'semester_type_id' => 1,
                            'session_id' => 2,
                            'start_date' => '2019-07-24',
                            'end_date' => '2019-12-20'
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'semester_type_id',
            'session_id',
            'start_date',
            'end_date'
        ]);

        $response->assertJson([
            'start_date' => '2019-07-24',
            'end_date' => '2019-12-20'
        ]);
    }
    
    /**
     * /api/semesters/1 PUT
     * 
     * should modify the Semester's name
     *
     * @return void
     */
    public function testUpdateSemester()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('semesters/1'), [
                            'start_date' => '2018-07-22',
                            'end_date' => '2018-12-18'
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'semester_type_id',
            'session_id',
            'start_date',
            'end_date'
        ]);

        $response->assertJson([
            'start_date' => '2018-07-22',
            'end_date' => '2018-12-18'
        ]);
    }
    
    /**
     * /api/semesters/1 DELETE
     * 
     * should delete the Semester
     *
     * @return void
     */
    public function testDeleteSemester()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('semesters/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
