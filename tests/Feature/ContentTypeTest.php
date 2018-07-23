<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContentTypeTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/content-types GET
     * 
     * should return a list of ContentTypes
     *
     * @return void
     */
    public function testGetContentTypeList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('schools/1/content-types'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'school_id',
                    'name',
                    'type'
                ]
            ]
        ]);
    }

    /**
     * /api/content-types/1 GET
     * 
     * should return a ContentType
     *
     * @return void
     */
    public function testGetContentType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('schools/1/content-types/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'school_id',
            'name',
            'type'
        ]);
    }
    
    /**
     * /api/content-types POST
     * 
     * should create a new ContentType
     *
     * @return void
     */
    public function testCreateContentType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('schools/1/content-types'), [
                            'name' => 'logo',
                            'display_name' => 'Logo',
                            'type' => 'App\\Models\\Schools'
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'school_id',
            'name',
            'type'
        ]);

        $response->assertJson([
            'name' => 'logo'
        ]);
    }
    
    /**
     * /api/content-types/1 PUT
     * 
     * should modify the ContentType's name
     *
     * @return void
     */
    public function testUpdateContentType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('schools/1/content-types/1'), [
                            'name' => 'logo 2',
                            'display_name' => 'Logo II'
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'school_id',
            'name',
            'type'
        ]);

        $response->assertJson([
            'name' => 'logo 2',
            'display_name' => 'Logo II'
        ]);
    }
    
    /**
     * /api/content-types/1 DELETE
     * 
     * should delete the ContentType
     *
     * @return void
     */
    public function testDeleteContentType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('schools/1/content-types/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
