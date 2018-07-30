<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Carbon\Carbon;

class ProspectTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/prospects GET
     * 
     * should return a list of Prospects
     *
     * @return void
     */
    public function testGetProspectList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('prospects'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'school_id',
                    'program_id',
                    'session_id'
                ]
            ]
        ]);
    }

    /**
     * /api/prospects/1 GET
     * 
     * should return a Prospect
     *
     * @return void
     */
    public function testGetProspect()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('prospects/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'school_id',
            'program_id',
            'session_id'
        ]);
    }
    
    /**
     * /api/prospects POST
     * 
     * should create a new Prospect
     *
     * @return void
     */
    public function testCreateProspect()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('prospects'), [
                            'school_id' => 1,
                            'program_id' => 1,
                            'session_id' => 2
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'id',
            'school_id',
            'program_id',
            'session_id'
        ]);

        $response->assertJson([
            'school_id' => 1,
            'program_id' => 1,
            'session_id' => 2
        ]);
    }
    
    /**
     * /api/prospects/1 PUT
     * 
     * should modify the Prospect's locked_at property
     *
     * @return void
     */
    public function testUpdateProspectLocked()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('prospects/1'), [
                            'is_locked' => true
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'school_id',
            'program_id',
            'session_id',
            'locked_at'
        ]);

        $response->assertJson([
            'school_id' => 1,
            'program_id' => 1,
            'session_id' => 1,
            'accepted_at' => null
        ]);

        $response->assertSeeText(Carbon::now()->toDateString());
    }
    
    /**
     * /api/prospects/1 PUT
     * 
     * should modify the Prospect's accepted_at property
     *
     * @return void
     */
    public function testUpdateProspectAccepted()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('prospects/1'), [
                            'is_accepted' => true
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'school_id',
            'program_id',
            'session_id',
            'accepted_at'
        ]);

        $response->assertJson([
            'school_id' => 1,
            'program_id' => 1,
            'session_id' => 1,
            'locked_at' => null
        ]);

        $response->assertSeeText(Carbon::now()->toDateString());
    }
    
    /**
     * /api/prospects/1 DELETE
     * 
     * should delete the Prospect
     *
     * @return void
     */
    public function testDeleteProspect()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('prospects/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
