<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use App\Models\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshImage;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ImageTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * /api/images GET
     * 
     * should return a list of Images
     *
     * @return void
     */
    public function testGetImageList()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('images'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'owner_id',
                    'image_type_id',
                    'location'
                ]
            ]
        ]);
    }

    /**
     * /api/images/1 GET
     * 
     * should return a Image
     *
     * @return void
     */
    public function testGetImage()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->get($this->url('images/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'owner_id',
            'image_type_id',
            'location'
        ]);
    }
    
    /**
     * /api/images POST
     * 
     * should create a new Image
     *
     * @return void
     */
    public function testCreateImage()
    {

        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('images'), [
                            'owner_id' => 1,
                            'image_type_id' => 1,
                            'file' => UploadedFile::fake()->image('avatar.jpg')
                        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'id',
            'owner_id',
            'image_type_id',
            'location'
        ]);

        $response->assertJson([
            'owner_id' => 1,
            'image_type_id' => 1
        ]);
    }
    
    /**
     * /api/images/1 PUT
     * 
     * should modify the Image's name
     *
     * @return void
     */
    public function testUpdateImage()
    {
        $image = Image::findOrFail(1);

        $response = $this->loginAsRole(Role::ADMIN)
                        ->post($this->url('images/1'), [
                            'file' => UploadedFile::fake()->image('avatar.jpg')
                        ]);
                        
        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'owner_id',
            'image_type_id',
            'location'
        ]);

        $this->assertTrue($image->location != $response->baseResponse->original->location);
    }
    
    /**
     * /api/images/1 DELETE
     * 
     * should delete the Image
     *
     * @return void
     */
    public function testDeleteImage()
    {
        $response = $this->loginAsRole(Role::ADMIN)
                        ->delete($this->url('images/1'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
