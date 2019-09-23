<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
     */

    'failed'          => 'Nämä tunnukset eivät vastaa tietojamme.',
    'throttle'        => 'Liian monta kirjautumisyritystä. Yritä uudelleen :seconds sekuntin päästä.',
    'unauthenticated' => 'Sinun täytyy olla kirjautunut sisään nähdäksesi tämän sivun.',

    /*
    |--------------------------------------------------------------------------
    | Auth Lines
    |--------------------------------------------------------------------------
     */

    'login' => [
        'title'           => 'Kirjaudu sisään',
        'lead'            => 'Päästäksesi tiliisi',
        'email'           => 'Sähköposti',
        'password'        => 'Salasana',
        'remember-me'     => 'Muista minut',
        'forgot-password' => 'Unohditko salasanasi?',
        'login'           => 'Kirjaudu',
    ],

    'reset' => [
        'title'                     => 'Palauta salasana',
        'lead'                      => 'Lähetämme linkin sähköpostitse.',
        'lead-alternative'          => 'Aseta uusi salasana. Pidä se tallessa.',
        'email'                     => 'Email',
        'didnt-forget-password'     => 'Etkö unohtanut salasanaa?',
        'send-link'                 => 'Lähetä linkki',
        'new-password'              => 'Uusi salasana',
        'new-password-confirmation' => 'Uusi salasana uudelleen',
    ],

    'register' => [
        'title'            => 'Rekisteröidy',
        'lead'             => 'Luo tili.',
        'first-name'       => 'Etunimi',
        'last-name'        => 'Sukunimi',
        'email'            => 'Sähköposti',
        'phone'            => 'Puhelinnumero',
        'phone-help'       => '(Valinnainen) Olemme yhteydessä puhelimitse mikäli tilauksessa ilmenee ongelmia.',
        'password'         => 'Salasana',
        'password-help'    => 'Salasanasi täytyy olla vähintään 8 merkkiä pitkä.',
        'confirm-password' => 'Salasana uudelleen',
        'register'         => 'Rekisteröidy',
    ],
];
