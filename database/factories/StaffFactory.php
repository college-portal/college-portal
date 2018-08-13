<?php

use Faker\Generator as Faker;
use Illuminate\Support\Collection;

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

$factory->define(CollegePortal\Models\Staff::class, function (Faker $faker) {
    $titles = array(
        'Mr.',
        'Mrs.',
        'Ms.',
        'Dr.',
        'Prof.'
    );

    return [
        'title' => $faker->randomElement($titles)
    ];
});
