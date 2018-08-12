<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use CollegePortal\Models\Role;
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
        $start_date = Carbon::now()->addDays(365)->toDateString();
        $end_date = Carbon::now()->addDays(365 + 180)->toDateString();

        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('semesters'), [
                            'semester_type_id' => 1,
                            'session_id' => 2,
                            'start_date' => $start_date,
                            'end_date' => $end_date
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'semester_type_id',
            'session_id',
            'start_date',
            'end_date'
        ]);

        $response->assertJson([
            'start_date' => $start_date,
            'end_date' => $end_date
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
        $start_date = Carbon::now()->addDays(1)->toDateString();
        $end_date = Carbon::now()->addDays(1 + 180)->toDateString();

        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('semesters/1'), [
                            'start_date' => $start_date,
                            'end_date' => $end_date
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'semester_type_id',
            'session_id',
            'start_date',
            'end_date'
        ]);

        $response->assertJson([
            'start_date' => $start_date,
            'end_date' => $end_date
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
