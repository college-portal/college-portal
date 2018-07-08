<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FacultyTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/faculties GET
     * 
     * should return a simple message
     *
     * @return void
     */
    public function testGetFacultyList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('faculties'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            [
                'name',
                'dean_id'
            ]
        ]);
    }
    
    /**
     * /api/faculties POST
     * 
     * should create a new Faculty
     *
     * @return void
     */
    public function testPostFacultyList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('faculties'), [
                            'name' => 'Science',
                            'school_id' => 1,
                            'dean_id' => 1
                        ]);
        echo json_encode($response);
        $response->assertStatus(201);

        $response->assertJsonStructure([
            'name',
            'dean_id'
        ]);
    }
}
