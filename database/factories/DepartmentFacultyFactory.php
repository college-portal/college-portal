<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$nameFactoryFunction = function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
};

$factory->define(App\Models\Department::class, $nameFactoryFunction);
$factory->define(App\Models\Faculty::class, $nameFactoryFunction);
