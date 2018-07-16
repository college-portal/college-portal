<?php

namespace Tests;

use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Artisan;

trait CreatesApplication
{
	private $api_version = 'v1';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        Hash::driver('bcrypt')->setRounds(4);

        return $app;
    }

    protected function url($path = '') {
        return "/api/{$this->api_version}/{$path}";
    }

    protected function setUp()
    {
        parent::setUp();

        Artisan::call('db:seed');
    }
    
    /**
     * tests a GET single endpoint
     */
    public function getSingleWithFilter(string $url, array $structure, $role_names = Role::ADMIN)
    {
        $response = $this->loginAsRole($role_names)
                        ->get($this->url($url));
                        
        $response->assertStatus(200);

        $response->assertJsonStructure($structure);
    }
}
