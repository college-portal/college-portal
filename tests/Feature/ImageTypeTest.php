<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ImageTypeTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/image-types GET
     * 
     * should return a list of ImageTypes
     *
     * @return void
     */
    public function testGetImageTypeList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('schools/1/image-types'));

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
     * /api/image-types/1 GET
     * 
     * should return a ImageType
     *
     * @return void
     */
    public function testGetImageType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('schools/1/image-types/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'school_id',
            'name',
            'type'
        ]);
    }
    
    /**
     * /api/image-types POST
     * 
     * should create a new ImageType
     *
     * @return void
     */
    public function testCreateImageType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('schools/1/image-types'), [
                            'school_id' => 1,
                            'name' => 'logo',
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
     * /api/image-types/1 PUT
     * 
     * should modify the ImageType's name
     *
     * @return void
     */
    public function testUpdateImageType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->put($this->url('schools/1/image-types/1'), [
                            'name' => 'logo 2'
                        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'school_id',
            'name',
            'type'
        ]);

        $response->assertJson([
            'name' => 'logo 2'
        ]);
    }
    
    /**
     * /api/image-types/1 DELETE
     * 
     * should delete the ImageType
     *
     * @return void
     */
    public function testDeleteImageType()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('schools/1/image-types/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
