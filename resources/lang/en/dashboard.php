<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Dashboard lines
    |--------------------------------------------------------------------------
    */

    'nav' => [
        'customers' => 'Details',
        'tickets'   => 'Tickets',
        'orders'    => 'Orders',
        'maps'      => 'Maps',
        'seats'     => 'Seats',
        'settings'  => 'Settings',
    ],

    /*
    |--------------------------------------------------------------------------
    | Customers
    |--------------------------------------------------------------------------
    */

    'customers' => [
        'table' => [
            'name'  => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
        ],
        'no-customers' => 'Wait until a customer purchases a ticket.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Tickets
    |--------------------------------------------------------------------------
    */

    'tickets' => [
        'table' => [
            'name'     => 'Name',
            'price'    => 'Price',
            'in-sale'  => 'In sale',
            'off-sale' => 'Off sale',
            'quota'    => 'Quota',
            'edit'     => 'Edit',
        ],
        'no-tickets' => 'Start by creating a new ticket.',
    ],
];
