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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Job::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(50),
        'description' => $faker->paragraph(1),
        'user_id' => $faker->numberBetween(1, 50),
        'salary' => $faker->numberBetween(10, 500000),
        'country' => $faker->country,
        'city' => $faker->city,
        'type_job_id' => $faker->numberBetween(1, 3),
    ];
});
