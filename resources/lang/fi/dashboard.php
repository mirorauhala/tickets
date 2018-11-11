<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Dashboard lines
    |--------------------------------------------------------------------------
    */

    'nav' => [
        'customers'      => 'Asiakkaat',
        'tickets'        => 'Liput',
        'tickets-create' => 'Liput / Luo uusi',
        'tickets-edit'   => 'Liput / Muokkaa <small class="pl-3">:ticket</small>',
        'orders'         => 'Tilaukset',
        'maps'           => 'Kartat',
        'maps-create'    => 'Kartat / Luo uusi',
        'maps-edit'      => 'Kartat / Muokkaa <small class="pl-3">:map</small>',
        'settings'       => 'Asetukset',
    ],

    /*
    |--------------------------------------------------------------------------
    | Customers
    |--------------------------------------------------------------------------
    */

    'customers' => [
        'table' => [
            'name'  => 'Nimi',
            'email' => 'Sähköposti',
            'phone' => 'Puhelin',
        ],
        'no-customers' => 'Odota kunnes asiakas tilaa lipun.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Tickets
    |--------------------------------------------------------------------------
    */

    'tickets' => [
        'table' => [
            'name'     => 'Nimi',
            'price'    => 'Hinta',
            'vat'      => 'ALV',
            'in-sale'  => 'Myynti alkaa',
            'off-sale' => 'Myynti loppuu',
            'quota'    => 'Kappalemäärä',
            'edit'     => 'Muokkaa',
        ],
        'no-tickets' => 'Aloita luomalla uusi lippu.',
    ],
];
