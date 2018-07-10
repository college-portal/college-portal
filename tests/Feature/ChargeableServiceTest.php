<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChargeableServiceTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/chargeable-services GET
     * 
     * should return a list of ChargeableServices
     *
     * @return void
     */
    public function testGetChargeableServiceList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('chargeable-services'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'type',
                    'name',
                    'amount'
                ]
            ]
        ]);
    }

    /**
     * /api/chargeable-services/1 GET
     * 
     * should return a ChargeableService
     *
     * @return void
     */
    public function testGetChargeableService()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('chargeable-services/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'type',
            'name',
            'amount'
        ]);
    }
    
    /**
     * /api/chargeable-services POST
     * 
     * should create a new ChargeableService
     *
     * @return void
     */
    public function testCreateChargeableService()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('chargeable-services'), [
                            'type' => 'App\\Models\\Session',
                            'name' => 'session-fees',
                            'amount' => 500,
                            'description' => 'The fees for a session',
                            'school_id' => 1
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'id',
            'type',
            'name',
            'amount'
        ]);

        $response->assertJson([
            'type' => 'App\\Models\\Session',
            'name' => 'session-fees',
            'amount' => 500
        ]);
    }
    
    /**
     * /api/chargeable-services/1 PUT
     * 
     * should modify the ChargeableService's name
     *
     * @return void
     */
    public function testUpdateChargeableService()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('chargeable-services/1'), [
                            'amount' => 600
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'type',
            'name',
            'amount'
        ]);

        $response->assertJson([
            'amount' => 600
        ]);
    }
    
    /**
     * /api/chargeable-services/1 DELETE
     * 
     * should delete the ChargeableService
     *
     * @return void
     */
    public function testDeleteChargeableService()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('chargeable-services/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
