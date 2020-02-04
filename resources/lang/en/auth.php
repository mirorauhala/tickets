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

    'failed'          => 'These credentials do not match our records.',
    'throttle'        => 'Too many login attempts. Please try again in :seconds seconds.',
    'unauthenticated' => 'You need to be logged in to view this page.',

    /*
    |--------------------------------------------------------------------------
    | Auth Lines
    |--------------------------------------------------------------------------
     */

    'login' => [
        'title'           => 'Sign In',
        'email'           => 'Email',
        'password'        => 'Password',
        'remember-me'     => 'Remember me',
        'forgot-password' => 'Forgot password?',
        'login'           => 'Sign In',
    ],

    'reset' => [
        'title'                     => 'Reset password',
        'lead'                      => 'We\'ll send a link to your email.',
        'lead-alternative'          => 'Set a new password. Keep it safe.',
        'email'                     => 'Email',
        'didnt-forget-password'     => 'Didn\'t forget password?',
        'send-link'                 => 'Send link',
        'new-password'              => 'New password',
        'new-password-confirmation' => 'New password confirmation',
    ],

    'register' => [
        'title'            => 'Sign Up',
        'first-name'       => 'First name',
        'last-name'        => 'Last name',
        'email'            => 'Email',
        'phone'            => 'Phone',
        'phone-help'       => '(Optional) We\'ll be in touch by phone in case there is a problem with your order.',
        'password'         => 'Password',
        'password-help'    => 'Your password must be at least 8 characters long.',
        'confirm-password' => 'Verify password',
        'register'         => 'Register',
    ],
];
