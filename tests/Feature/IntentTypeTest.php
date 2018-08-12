<?php

namespace Tests\Feature;

use Tests\TestCase;
use CollegePortal\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IntentTypeTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/intent-types GET
     * 
     * should return a list of IntentTypes
     *
     * @return void
     */
    public function testGetIntentTypeList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('intent-types'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'name'
                ]
            ]
        ]);
    }

    /**
     * /api/intent-types/1 GET
     * 
     * should return a IntentType
     *
     * @return void
     */
    public function testGetIntentType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('intent-types/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'name'
        ]);
    }
    
    /**
     * /api/intent-types POST
     * 
     * should create a new IntentType
     *
     * @return void
     */
    public function testCreateIntentType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('intent-types'), [
                            'name' => 'change-name'
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'id',
            'name'
        ]);

        $response->assertJson([
            'name' => 'change-name'
        ]);
    }
    
    /**
     * /api/intent-types/1 PUT
     * 
     * should modify the IntentType's name
     *
     * @return void
     */
    public function testUpdateIntentType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('intent-types/1'), [
                            'name' => 'change-profile-image'
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'name'
        ]);

        $response->assertJson([
            'name' => 'change-profile-image'
        ]);
    }
    
    /**
     * /api/intent-types/1 DELETE
     * 
     * should delete the IntentType
     *
     * @return void
     */
    public function testDeleteIntentType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('intent-types/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
