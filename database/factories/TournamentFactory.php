<?php

/* @var \Illuminate\Database\Eloquent\Factory $factory */
use Carbon\Carbon;
use Domain\Events\Event;
use Faker\Generator as Faker;

$factory->define(App\Models\Tournament::class, function (Faker $faker) {
    return [
        'name'                => $faker->name,
        'description'         => $faker->text,
        'rules'               => $faker->text,
        'registration_start'  => Carbon::now(),
        'registration_end'    => Carbon::now()->addWeek(),
        'max_teams'           => 16,
        'team_min_size'       => 1,
        'team_max_size'       => 5,
        'event_id'            => function () {
            return factory(Event::class)->create()->id;
        },
    ];
});
