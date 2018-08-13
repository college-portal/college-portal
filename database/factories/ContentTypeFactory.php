<?php

use Faker\Generator as Faker;
use CollegePortal\Models\Staff;
use CollegePortal\Models\User;
use CollegePortal\Models\Department;
use CollegePortal\Models\ContentType;

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

$factory->define(CollegePortal\Models\ContentType::class, function (Faker $faker) {
    $name = $faker->unique()->randomElement([
        'type-1',
        'type-2',
        'type-3',
        'type-4',
        'type-5',
        'type-6',
        'type-7',
        'type-8',
        'type-9',
        'type-10'
    ]);
    return [
        'type' => $faker->randomElement([
            Staff::class,
            User::class,
            Department::class
        ]),
        'name' => $name,
        'display_name' => ucwords(str_replace('-', ' ', $name)),
        'format' => $faker->randomElement(ContentType::formats())
    ];
});
