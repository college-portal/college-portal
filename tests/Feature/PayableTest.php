<?php

namespace Tests\Feature;

use Tests\TestCase;
use CollegePortal\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Carbon\Carbon;

class PayableTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/payables GET
     * 
     * should return a list of Payables
     *
     * @return void
     */
    public function testGetPayableList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('payables'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'chargeable_id',
                    'user_id'
                ]
            ]
        ]);
    }

    /**
     * /api/payables/1 GET
     * 
     * should return a Payable
     *
     * @return void
     */
    public function testGetPayable()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('payables/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'chargeable_id',
            'user_id'
        ]);
    }
    
    /**
     * /api/payables POST
     * 
     * should create a new Payable
     *
     * @return void
     */
    public function testCreatePayable()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('payables'), [
                            'chargeable_id' => 1,
                            'user_id' => 5
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'id',
            'chargeable_id',
            'user_id'
        ]);

        $response->assertJson([
            'chargeable_id' => 1,
            'user_id' => 5
        ]);
    }
    
    /**
     * /api/payables/1 PUT
     * 
     * should modify the Payable's name
     *
     * @return void
     */
    public function testUpdatePayable()
    {
        $today = Carbon::today();
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('payables/1'), [
                            'is_paid' => true
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'chargeable_id',
            'user_id',
            'paid_at'
        ]);

        $response->assertSeeText($today->toDateString());
    }
    
    /**
     * /api/payables/1 DELETE
     * 
     * should delete the Payable
     *
     * @return void
     */
    public function testDeletePayable()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('payables/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
