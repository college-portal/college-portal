<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContentTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/contents GET
     * 
     * should return a list of Contents
     *
     * @return void
     */
    public function testGetContentList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('contents'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'owner_id',
                    'value',
                    'content_type_id'
                ]
            ]
        ]);
    }

    /**
     * /api/contents/1 GET
     * 
     * should return a Content
     *
     * @return void
     */
    public function testGetContent()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('contents/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'owner_id',
            'value',
            'content_type_id'
        ]);
    }
    
    /**
     * /api/contents POST
     * 
     * should create a new Content
     *
     * @return void
     */
    public function testCreateContent()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('contents'), [
                            'owner_id' => 1,
                            'value' => "Male",
                            'content_type_id' => 1
                        ]);
                        
        $response->assertStatus(201);

        $response->assertJsonStructure([
            'id',
            'owner_id',
            'value',
            'content_type_id'
        ]);

        $response->assertJson([
            'value' => "Male"
        ]);
    }
    
    /**
     * /api/contents/1 PUT
     * 
     * should modify the Content's name
     *
     * @return void
     */
    public function testUpdateContent()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('contents/1'), [
                            'value' => 'Female'
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'owner_id',
            'value',
            'content_type_id'
        ]);

        $response->assertJson([
            'value' => 'Female'
        ]);
    }
    
    /**
     * /api/contents/1 DELETE
     * 
     * should delete the Content
     *
     * @return void
     */
    public function testDeleteContent()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('contents/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
