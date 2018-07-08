<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RootTest extends TestCase
{
    /**
     * /api/ GET
     * 
     * should return a simple message
     *
     * @return void
     */
    public function testRoot()
    {
        $response = $this->get($this->url());

        $response->assertStatus(200);

        $response->assertJson([
            'message' => 'college-portal'
        ]);
    }
}
