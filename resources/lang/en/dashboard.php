<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Dashboard lines
    |--------------------------------------------------------------------------
     */

    'nav' => [
        'customers'      => 'Customers',
        'tickets'        => 'Tickets',
        'tickets-create' => 'Tickets / Create a new ticket',
        'tickets-edit'   => 'Tickets / Edit <small class="pl-3">:ticket</small>',
        'orders'         => 'Orders',
        'maps'           => 'Maps',
        'maps-create'    => 'Maps / Create a new map',
        'maps-edit'      => 'Maps / Edit <small class="pl-3">:map</small>',
        'settings'       => 'Settings',
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
            'vat'      => 'VAT',
            'in-sale'  => 'In sale',
            'off-sale' => 'Off sale',
            'quota'    => 'Quota',
            'edit'     => 'Edit',
        ],
        'no-tickets' => 'Start by creating a new ticket.',
    ],
];
