<?php

namespace Tests\Feature;

use Tests\TestCase;
use CollegePortal\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChargeableTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/chargeables GET
     * 
     * should return a list of Chargeables
     *
     * @return void
     */
    public function testGetChargeableList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('chargeables'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'chargeable_service_id',
                    'owner_id',
                    'amount'
                ]
            ]
        ]);
    }

    /**
     * /api/chargeables/1 GET
     * 
     * should return a Chargeable
     *
     * @return void
     */
    public function testGetChargeable()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('chargeables/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'chargeable_service_id',
            'owner_id',
            'amount'
        ]);
    }
    
    /**
     * /api/chargeables POST
     * 
     * should create a new Chargeable
     *
     * @return void
     */
    public function testCreateChargeable()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('chargeables'), [
                            'chargeable_service_id' => 1,
                            'owner_id' => 2
                        ]);
                        
        $response->assertStatus(201);

        $response->assertJsonStructure([
            'id',
            'chargeable_service_id',
            'owner_id',
            'amount'
        ]);

        $response->assertJson([
            'chargeable_service_id' => 1
        ]);
    }
    
    /**
     * /api/chargeables/1 PUT
     * 
     * should modify the Chargeable's name
     *
     * @return void
     */
    public function testUpdateChargeable()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('chargeables/1'), [
                            'amount' => 700
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'chargeable_service_id',
            'owner_id',
            'amount'
        ]);

        $response->assertJson([
            'amount' => 700
        ]);
    }
    
    /**
     * /api/chargeables/1 DELETE
     * 
     * should delete the Chargeable
     *
     * @return void
     */
    public function testDeleteChargeable()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('chargeables/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
