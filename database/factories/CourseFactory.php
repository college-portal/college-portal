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

$factory->define(App\Models\Course::class, function (Faker $faker) {
    return [
        'title' => $faker->randomElement(array(
            'Basic Algebra',
            'Discrete Mathematics',
            'Algorithms and Data Structures',
            'Kinematics',
            'Physical Sciences',
            'Oscillatory Motion',
            'Signal Analysis'
        )),
        'code' => ($faker->currencyCode . $faker->numberBetween(100, 200)),
        'credit' => $faker->numberBetween(1, 6)
    ];
});
