<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Settings Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used within the user settings.
    |
    */

    'header' => 'Settings',

    /*
    |--------------------------------------------------------------------------
    | Flash messages
    |--------------------------------------------------------------------------
    |
    | The following language lines are displayed when an action has been
    | executed.
    |
    */

    'flash' => [
        'profile'                   => 'Profile updated!',
        'password'                  => 'Password changed!',
        'language'                  => 'Display language changed!',
    ],

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    |
    | The following language lines are used within the profile form in settings.
    |
    */

    'nav.profile'                   => 'Profile',
    'panel.title.profile'           => 'Profile',

    'profile' => [
        'first-name'                => 'First name',
        'last-name'                 => 'Last name',
        'email'                     => 'Email',
    ],

    /*
    |--------------------------------------------------------------------------
    | Language
    |--------------------------------------------------------------------------
    |
    | The following language lines are used within the language form in
    | settings.
    |
    */

    'nav.language'                  => 'Language',
    'panel.title.language'          => 'Language',

    'language.language'             => 'Display language',

    /*
    |--------------------------------------------------------------------------
    | Change password
    |--------------------------------------------------------------------------
    |
    | The following language lines are used within the language form in
    | settings.
    |
    */

    'nav.change-password'           => 'Change password',
    'panel.title.change-password'   => 'Change password',

    'change-password' => [
        'current'                   => 'Current password',
        'new'                       => 'New password',
        'confirmation'              => 'New password again',
    ],

    /*
    |--------------------------------------------------------------------------
    | Orders
    |--------------------------------------------------------------------------
    |
    | The following language lines are used within the orders table in
    | settings.
    |
    */

    'nav.orders'                    => 'Orders',

    // a singular Order
    'order' => [
        'title'                     => 'Order',
        'no-orders'                 => 'You have no orders.',

        'item-title'                => 'Reference',
        'value'                     => 'Value',
        'seating-code'              => 'Seating code',
    ],

    // all user's orders
    'orders' => [
        'title'                     => 'Orders',
        'no-items'                  => 'There are no items in this order.',

        'reference'                 => 'Reference',
        'value'                     => 'Value',
        'status'                    => 'Status',
        'date'                      => 'Date of payment',
        'action'                    => 'Action',
    ],

];
