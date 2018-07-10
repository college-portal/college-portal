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

$factory->define(App\Models\ImageType::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement([
            'App\\Models\\Staff',
            'App\\User',
            'App\\Models\\Department'
        ]),
        'name' => $faker->unique()->randomElement([
            'Type 1',
            'Type 2',
            'Type 3',
            'Type 4',
            'Type 5',
        ])
    ];
});
