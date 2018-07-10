<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LevelTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/levels GET
     * 
     * should return a list of Levels
     *
     * @return void
     */
    public function testGetLevelList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('schools/1/levels'));

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
     * /api/levels/1 GET
     * 
     * should return a Level
     *
     * @return void
     */
    public function testGetLevel()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('schools/1/levels/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'name',
            'school_id'
        ]);
    }
    
    /**
     * /api/levels POST
     * 
     * should create a new Level
     *
     * @return void
     */
    public function testCreateLevel()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('schools/1/levels'), [
                            'name' => '500L'
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'id',
            'name',
            'school_id'
        ]);

        $response->assertJson([
            'name' => '500L'
        ]);
    }
    
    /**
     * /api/levels/1 PUT
     * 
     * should modify the Level's name
     *
     * @return void
     */
    public function testUpdateLevel()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('schools/1/levels/1'), [
                            'name' => '600L'
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'name',
            'school_id'
        ]);

        $response->assertJson([
            'name' => '600L'
        ]);
    }
    
    /**
     * /api/levels/1 DELETE
     * 
     * should delete the Level
     *
     * @return void
     */
    public function testDeleteLevel()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('schools/1/levels/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
