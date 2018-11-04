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
        'title'   => '403 Forbidden',
        'subtext' => 'You don\'t have the access to this resource.',
    ],

    'not-found' => [
        'title'   => '404 Not Found',
        'subtext' => 'We couldn\'t find what you were looking for.',
    ],

    'method-not-allowed' => [
        'title'   => '405 Method Not Allowed',
        'subtext' => 'A request method is not supported for the requested resource.',
    ],

    'internal-server-error' => [
        'title'   => '500 Internal Server Error',
        'subtext' => 'While processing your request we had an internal error. Sorry about that.',
    ],
];
