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
$factory->define(Tikematic\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = 'secret',
        'remember_token' => str_random(10),

        'street_address' => 'Ankkalinnantie 13',
        'postal_code' => '00100',
        'postal_office' => 'Helsinki',
        'country_code' => 'FI',
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Tikematic\Models\Event::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->company,
        'location' => $faker->address,
        'details' => $faker->text,
        'url' => $faker->url,
        'currency' => 'EUR',
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Tikematic\Models\Map::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => 'Map ' . uniqid(),
        'description' => $faker->sentence,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Tikematic\Models\Ticket::class, function (Faker\Generator $faker) {
    static $password;

    return [

        'name' => $faker->sentence,
        'price' => 1000,
        'vat' => 10,
        'reserved' => 10,
        'maxAmountPerTransaction' => 5,
        'availableAt' => \Carbon\Carbon::now(),
        'unavailableAt' => \Carbon\Carbon::now()->addWeek(),
        'is_seatable' => 1,
        'event_id' => 1,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Tikematic\Models\Seat::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => uniqid(),
        'status' => "available",
    ];
});
