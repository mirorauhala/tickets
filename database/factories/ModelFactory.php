<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Tikematic\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->first_name,
        'last_name' => $faker->last_name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = 'secret',
        'remember_token' => str_random(10),
    ];
});


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Tikematic\Event::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->company,
        'location' => $faker->address,
        'details' => $faker->text,
        'url' => $faker->url,
    ];
});
