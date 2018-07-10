<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SemesterTypeTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/semester-types GET
     * 
     * should return a list of SemesterTypes
     *
     * @return void
     */
    public function testGetSemesterTypeList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('schools/1/semester-types'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'name',
                    'school_id'
                ]
            ]
        ]);
    }

    /**
     * /api/semester-types/1 GET
     * 
     * should return a SemesterType
     *
     * @return void
     */
    public function testGetSemesterType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('schools/1/semester-types/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'name',
            'school_id'
        ]);
    }
    
    /**
     * /api/semester-types POST
     * 
     * should create a new SemesterType
     *
     * @return void
     */
    public function testCreateSemesterType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('schools/1/semester-types'), [
                            'name' => '3rd Semester'
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'id',
            'name',
            'school_id'
        ]);

        $response->assertJson([
            'name' => '3rd Semester'
        ]);
    }
    
    /**
     * /api/semester-types/1 PUT
     * 
     * should modify the SemesterType's name
     *
     * @return void
     */
    public function testUpdateSemesterType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('schools/1/semester-types/1'), [
                            'name' => '4th Semester'
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'name',
            'school_id'
        ]);

        $response->assertJson([
            'name' => '4th Semester'
        ]);
    }
    
    /**
     * /api/semester-types/1 DELETE
     * 
     * should delete the SemesterType
     *
     * @return void
     */
    public function testDeleteSemesterType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('schools/1/semester-types/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
