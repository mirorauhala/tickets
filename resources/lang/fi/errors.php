<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Error Page Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used when the server responds with an
    | HTTP status code that needs to display an error message.
    |
     */

    'forbidden' => [
        'title'   => '403 Pääsy evätty',
        'subtext' => 'Sinulla ei ole oikeutta tähän resurssiin.',
    ],

    'not-found' => [
        'title'   => '404 Ei löydy',
        'subtext' => 'Emme löytäneet etsimääsi sivua.',
    ],

    'method-not-allowed' => [
        'title'   => '405 Menetelmä ei sallittu',
        'subtext' => 'Pyynnön menetelmää ei tueta pyydetyllä resurssilla.',
    ],

    'internal-server-error' => [
        'title'   => '500 Sisäinen palvelinvirhe',
        'subtext' => 'Pyynnön käsittelyssä meillä tapahtui sisäinen virhe. Anteeksi siitä.',
    ],
];
