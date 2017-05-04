<?php

namespace Tikematic\Http\Controllers\Auth;

use Socialite;
use Tikematic\Http\Controllers\Controller;

class SocialiteController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Handles Socialite authentication
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    /**
     * Redirect user to Discord
     *
     * @return void
     */
    public function redirectDiscord()
    {
        return Socialite::with('discord')->redirect();
    }

    /**
     * Get data from Discord callback
     *
     * @return void
     */
    public function callbackDiscord() {
        $user = Socialite::driver('discord')->user();
        dd($user);
    }
}
