<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Carbon\Carbon;
use Domain\User\User;
use App\Models\Event;
use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'reference'          => strtoupper(bin2hex(openssl_random_pseudo_bytes(6))),
        'currency'           => 'EUR',
        'value'              => 10000,
        'vat'                => 14,
        'status'             => 'paid',
        'payer_name'         => $faker->name,
        'release_lock_after' => Carbon::now(),
        'event_id'           => function () {
            return factory(Event::class)->create()->id;
        },
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
