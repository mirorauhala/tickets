<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Carbon\Carbon;
use Domain\Users\User;
use Domain\Orders\Order;
use Domain\Tickets\Ticket;
use Domain\OrderItems\OrderItem;
use Faker\Generator as Faker;

$factory->define(OrderItem::class, function (Faker $faker) {
    return [
        'title'              => $faker->title,
        'barcode'            => strtoupper(bin2hex(openssl_random_pseudo_bytes(6))),
        'value'              => 1000,
        'status'             => 'paid',
        'release_lock_after' => Carbon::now(),
        'ticket_id'          => function () {
            return factory(Ticket::class)->create()->id;
        },
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'order_id' => function () {
            return factory(Order::class)->create()->id;
        },
    ];
});
