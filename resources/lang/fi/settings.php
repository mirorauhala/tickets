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

    'header' => 'Asetukset',

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
        'profile'                   => 'Profiili päivitetty!',
        'password'                  => 'Salasana vaihdettu!',
        'language'                  => 'Näyttökieli vaihdettu!',
    ],

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    |
    | The following language lines are used within the profile form in settings.
    |
    */

    'nav.profile'                   => 'Profiili',
    'panel.title.profile'           => 'Profiili',

    'profile' => [
        'first-name'                => 'Etunimi',
        'last-name'                 => 'Sukunimi',
        'email'                     => 'Sähköposti',
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

    'nav.language'                  => 'Kieli',
    'panel.title.language'          => 'Kieli',

    'language.language'             => 'Näyttökieli',

    /*
    |--------------------------------------------------------------------------
    | Change password
    |--------------------------------------------------------------------------
    |
    | The following language lines are used within the language form in
    | settings.
    |
    */

    'nav.change-password'           => 'Vaihda salasana',
    'panel.title.change-password'   => 'Vaihda salasana',

    'change-password' => [
        'current'                   => 'Nykyinen salasana',
        'new'                       => 'Uusi salasana',
        'confirmation'              => 'Uusi salasana uudelleen',
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

    'nav.orders'                    => 'Tilaukset',

    // a singular Order
    'order' => [
        'title'                     => 'Tilaus',
        'no-orders'                 => 'Sinulla ei ole tilauksia.',

        'item-title'                => 'Tuote',
        'value'                     => 'Arvo',
    ],

    // all user's orders
    'orders' => [
        'title'                     => 'Tilaukset',
        'no-items'                  => 'Tilauksessa ei ole tuotteita.',

        'reference'                 => 'Koodi',
        'value'                     => 'Arvo',
        'status'                    => 'Tila',
        'date'                      => 'Ostopäivämäärä',
        'action'                    => 'Toiminto',
    ],

];
