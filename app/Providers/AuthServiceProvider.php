<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\School' => 'App\Policies\SchoolPolicy',
        'App\User' => 'App\Policies\UserPolicy',
        'App\Models\Faculty' => 'App\Policies\FacultyPolicy',
        'App\Models\Department' => 'App\Policies\DepartmentPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
