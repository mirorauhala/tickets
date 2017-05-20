<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Event Lines
    |--------------------------------------------------------------------------
    */

    'nav' => [
        'details'                   => 'Tietoa',
        'maps'                      => 'Kartat',
        'tickets'                   => 'Liput',
        'tournaments'               => 'Kilpailut',
    ],

    /*
    |--------------------------------------------------------------------------
    | Event Admin Lines
    |--------------------------------------------------------------------------
    */

    'admin' => [

        'visibility' => [
            'offline' => '<strong>Jei!</strong> Tapahtuma on näkyvissä vierailijoille. <a :attributes>Muuta</a>',
            'online' => '<strong>Huomaathan!</strong> Tapahtuma ei ole näkyvissä vierailijoille. <a :attributes>Muuta</a>',
        ],

        'nav' => [
            'orders'                => 'Tilaukset',
            'tournaments'           => 'Kilpailut',
            'maps'                  => 'Kartat',
            'tickets'               => 'Liput',
            'prices'                => 'Hinnat',
            'settings'              => 'Asetukset',
        ],

        'pages' => [
            'orders' => [
                'title' => 'Tilaukset',

            ],
            'tournaments'   => [],
            'maps'          => [],
            'tickets'       => [],
            'prices'        => [],
            'settings'      => [
                'title' => 'Asetukset',

                'form' => [
                    'event-name' => 'Tapahtuman nimi',
                    'event-name-placeholder' => 'Tapahtuman nimi',

                    'event-location' => 'Tapahtuman sijainti',
                    'event-location-placeholder' => 'Tapahtuman sijainti',

                    'event-url' => 'Tapahtuman URL',
                    'event-url-placeholder' => 'Tapahtuman URL',

                    'event-currency' => 'Tapahtuman valuutta',
                    'event-currency-placeholder' => 'Tapahtuman valuutta',

                    'event-visibility' => 'Tapahtuman näkyvyys',
                    'event-visibility-placeholder' => 'Tapahtuman näkyvyys',

                    'event-visibility-offline' => 'Tapahtuma on näkymätön. Maksuja ei voida suorittaa.',
                    'event-visibility-online' => 'Tapahtuma on näkyvissä. Maksuja voidaan suorittaa kunhan liput ovat näkyvissä.',

                ],
            ],
        ],
    ],

];
