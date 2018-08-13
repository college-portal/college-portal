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

$factory->define(CollegePortal\Models\School::class, function (Faker $faker) {
    $schools = array(
        'UI' => 'University of Ibadan',
        'UNILORIN' => 'University of Ilorin',
        'UNILAG' => 'University of Lagos',
        'OAU' =>'Obafemi Awolowo University',
        'YABATECH' => 'Yaba College of Technology'
    );
    $key = $faker->randomKey($schools);
    $school = $schools[$key];

    return [
        'name' => $school,
        'short_name' => $key
    ];
});
