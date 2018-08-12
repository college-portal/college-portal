<?php

namespace Tests\Feature;

use Tests\TestCase;
use CollegePortal\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProgramCreditTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/program-credits GET
     * 
     * should return a list of ProgramCredits
     *
     * @return void
     */
    public function testGetProgramCreditList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('program-credits'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'program_id',
                    'semester_id',
                    'level_id',
                    'credit'
                ]
            ]
        ]);
    }

    /**
     * /api/program-credits/1 GET
     * 
     * should return a ProgramCredit
     *
     * @return void
     */
    public function testGetProgramCredit()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('program-credits/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'program_id',
            'semester_id',
            'level_id',
            'credit'
        ]);
    }
    
    /**
     * /api/program-credits POST
     * 
     * should create a new ProgramCredit
     *
     * @return void
     */
    public function testCreateProgramCredit()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('program-credits'), [
                            'program_id' => 1,
                            'semester_id' => 1,
                            'level_id' => 4,
                            'credit' => 19
                        ]);
                        
        $response->assertStatus(201);

        $response->assertJsonStructure([
            'program_id',
            'semester_id',
            'level_id',
            'credit'
        ]);

        $response->assertJson([
            'credit' => 19
        ]);
    }
    
    /**
     * /api/program-credits/1 PUT
     * 
     * should modify the ProgramCredit's name
     *
     * @return void
     */
    public function testUpdateProgramCredit()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('program-credits/1'), [
                            'credit' => 22
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'program_id',
            'semester_id',
            'level_id',
            'credit'
        ]);

        $response->assertJson([
            'credit' => 22
        ]);
    }
    
    /**
     * /api/program-credits/1 DELETE
     * 
     * should delete the ProgramCredit
     *
     * @return void
     */
    public function testDeleteProgramCredit()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('program-credits/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
