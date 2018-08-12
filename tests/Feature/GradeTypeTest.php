<?php

namespace Tests\Feature;

use Tests\TestCase;
use CollegePortal\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GradeTypeTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/grade-types GET
     * 
     * should return a list of GradeTypes
     *
     * @return void
     */
    public function testGetGradeTypeList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('schools/1/grade-types'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'school_id',
                    'name',
                    'value',
                    'minimum',
                    'maximum'
                ]
            ]
        ]);
    }

    /**
     * /api/grade-types/1 GET
     * 
     * should return a GradeType
     *
     * @return void
     */
    public function testGetGradeType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('schools/1/grade-types/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'school_id',
            'name',
            'value',
            'minimum',
            'maximum'
        ]);
    }
    
    /**
     * /api/grade-types POST
     * 
     * should create a new GradeType
     *
     * @return void
     */
    public function testCreateGradeType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('schools/1/grade-types'), [
                            'name' => 'F',
                            'value' => 0,
                            'minimum' => 0,
                            'maximum' => 40
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'school_id',
            'name',
            'value',
            'minimum',
            'maximum'
        ]);

        $response->assertJson([
            'name' => 'F'
        ]);
    }
    
    /**
     * /api/grade-types/1 PUT
     * 
     * should modify the GradeType's name
     *
     * @return void
     */
    public function testUpdateGradeType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('schools/1/grade-types/1'), [
                            'name' => 'G'
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'school_id',
            'name',
            'value',
            'minimum',
            'maximum'
        ]);

        $response->assertJson([
            'name' => 'G'
        ]);
    }
    
    /**
     * /api/grade-types/1 DELETE
     * 
     * should delete the GradeType
     *
     * @return void
     */
    public function testDeleteGradeType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('schools/1/grade-types/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
