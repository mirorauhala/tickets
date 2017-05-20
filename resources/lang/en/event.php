<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Event Lines
    |--------------------------------------------------------------------------
    */

    'nav' => [
        'details'                   => 'Details',
        'maps'                      => 'Maps',
        'tickets'                   => 'Tickets',
        'tournaments'               => 'Tournaments'
    ],

    /*
    |--------------------------------------------------------------------------
    | Event Admin Lines
    |--------------------------------------------------------------------------
    */

    'admin' => [

        'visibility' => [
            'offline' => '<strong>Yey!</strong> Event is live and visible to visitors. <a :attributes>Change</a>',
            'online' => '<strong>Heads up!</strong> Event is not live yet. <a :attributes>Change</a>',
        ],

        'flash' => 'Event\'s settings updated.',

        'nav' => [
            'orders'                => 'Orders',
            'tournaments'           => 'Tournaments',
            'maps'                  => 'Maps',
            'tickets'               => 'Tickets',
            'prices'                => 'Prices',
            'settings'              => 'Settings',
        ],

        'pages' => [
            'orders' => [
                'title' => 'Orders',

            ],
            'tournaments'   => [],
            'maps'          => [],
            'tickets'       => [],
            'prices'        => [],
            'settings'      => [
                'title' => 'Settings',

                'form' => [
                    'event-name' => 'Event\'s name',
                    'event-name-placeholder' => 'Event\'s name',

                    'event-location' => 'Event\'s location',
                    'event-location-placeholder' => 'Event location',

                    'event-url' => 'Event\'s URL',
                    'event-url-placeholder' => 'Event URL',

                    'event-currency' => 'Event\'s currency',
                    'event-currency-placeholder' => 'Event currency',

                    'event-visibility' => 'Event\'s visibility',
                    'event-visibility-placeholder' => 'Event visibility',

                    'event-visibility-offline' => 'Event is offline. No payments can be processed.',
                    'event-visibility-online' => 'Event is online. Payments are welcome but can only be processed if tickets are visible.',

                ],
            ],
        ],
    ],

];
