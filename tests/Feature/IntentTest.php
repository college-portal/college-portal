<?php

namespace Tests\Feature;

use Tests\TestCase;
use CollegePortal\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IntentTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/intents GET
     * 
     * should return a list of Intents
     *
     * @return void
     */
    public function testGetIntentList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('intents'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'user_id',
                    'intent_type_id',
                    'extras'
                ]
            ]
        ]);
    }

    /**
     * /api/intents/1 GET
     * 
     * should return a Intent
     *
     * @return void
     */
    public function testGetIntent()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('intents/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'user_id',
            'intent_type_id',
            'extras'
        ]);
    }
    
    /**
     * /api/intents POST
     * 
     * should create a new Intent
     *
     * @return void
     */
    public function testCreateIntent()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('intents'), [
                            'intent_type_id' => 1,
                            'extras' => [
                                'after' => '2FA'
                            ]
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'id',
            'user_id',
            'intent_type_id',
            'extras'
        ]);

        $response->assertJson([
            'intent_type_id' => 1,
            'extras' => json_encode([
                'after' => '2FA'
            ])
        ]);
    }
    
    /**
     * /api/intents/1 PUT
     * 
     * should modify the Intent's name
     *
     * @return void
     */
    public function testUpdateIntent()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('intents/1'), [
                            'intent_type_id' => 1
                        ]);

        $response->assertStatus(501);
    }
    
    /**
     * /api/intents/1 DELETE
     * 
     * should delete the Intent
     *
     * @return void
     */
    public function testDeleteIntent()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('intents/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
