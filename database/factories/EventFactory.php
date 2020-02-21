<?php

use Illuminate\Support\Str;

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

/* @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Domain\Events\Event::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name'        => $company = $faker->company,
        'slug'        => Str::slug($company),
        'location'    => $faker->address,
        'slogan'      => $faker->text,
        'url'         => $faker->url,
    ];
});
