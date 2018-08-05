<?php

namespace Mykeels\Filters;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class FilterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Mykeels\Filters\BaseFilters');
    }
}
