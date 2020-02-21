<?php

use Domain\Events\Event;

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
$factory->define(App\Models\Ticket::class, function (Faker\Generator $faker) {
    return [
        'name'                    => $faker->word,
        'price'                   => 1000,
        'vat'                     => 10,
        'reserved'                => 10,
        'maxAmountPerTransaction' => 5,
        'availableAt'             => \Carbon\Carbon::now(),
        'unavailableAt'           => \Carbon\Carbon::now()->addWeek(),
        'event_id'                => function () {
            return factory(Event::class)->create()->id;
        },
    ];
});
