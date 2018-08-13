<?php

namespace Tests\Feature;

use Tests\TestCase;
use CollegePortal\Models\Role;
use CollegePortal\Models\School;
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
                        ->get($this->url('content-types'));

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
                        ->get($this->url('content-types/1'));

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
    public function testCreateContentTypeWithNoFormat()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('content-types'), [
                            'name' => 'logo',
                            'display_name' => 'Logo',
                            'type' => School::class,
                            'school_id' => 1
                        ]);

        $response->assertStatus(422);
    }
    
    /**
     * /api/content-types POST
     * 
     * should create a new ContentType
     *
     * @return void
     */
    public function testCreateContentTypeWithNumberFormat()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('content-types'), [
                            'name' => 'no_of_parks',
                            'display_name' => 'No. of Parks',
                            'type' => School::class,
                            'format' => 'number',
                            'school_id' => 1
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'school_id',
            'name',
            'type',
            'format'
        ]);

        $response->assertJson([
            'name' => 'no_of_parks'
        ]);
    }
    
    /**
     * /api/content-types POST
     * 
     * should create a new ContentType
     *
     * @return void
     */
    public function testCreateContentTypeWithStringFormat()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('content-types'), [
                            'name' => 'logo',
                            'display_name' => 'Logo',
                            'type' => School::class,
                            'format' => 'string',
                            'school_id' => 1
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'school_id',
            'name',
            'type',
            'format'
        ]);

        $response->assertJson([
            'name' => 'logo'
        ]);
    }
    
    /**
     * /api/content-types POST
     * 
     * should create a new ContentType
     *
     * @return void
     */
    public function testCreateContentTypeWithBooleanFormat()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('content-types'), [
                            'name' => 'has_parks',
                            'display_name' => 'Has Parks',
                            'type' => School::class,
                            'format' => 'boolean',
                            'school_id' => 1
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'school_id',
            'name',
            'type',
            'format'
        ]);

        $response->assertJson([
            'name' => 'has_parks'
        ]);
    }
    
    /**
     * /api/content-types POST
     * 
     * should create a new ContentType
     *
     * @return void
     */
    public function testCreateContentTypeWithObjectFormat()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('content-types'), [
                            'name' => 'settings',
                            'display_name' => 'Settings',
                            'type' => School::class,
                            'format' => 'number',
                            'school_id' => 1
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'school_id',
            'name',
            'type',
            'format'
        ]);

        $response->assertJson([
            'name' => 'settings'
        ]);
    }
    
    /**
     * /api/content-types POST
     * 
     * should create a new ContentType
     *
     * @return void
     */
    public function testCreateContentTypeWithArrayFormat()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('content-types'), [
                            'name' => 'phones',
                            'display_name' => 'Phones',
                            'type' => School::class,
                            'format' => 'array',
                            'school_id' => 1
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'school_id',
            'name',
            'type',
            'format'
        ]);

        $response->assertJson([
            'name' => 'phones'
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
                        ->put($this->url('content-types/1'), [
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
                        ->delete($this->url('content-types/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
