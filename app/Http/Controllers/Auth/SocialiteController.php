<?php

namespace App\Http\Controllers\Auth;

use App\Platform;
use Socialite;
use App\Http\Controllers\Controller;

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
        $callbackUser = Socialite::driver('discord')->user();

        // Try to find an account
        if($realUser = Platform::where('platform_id', $callbackUser->id)->first()) {
            auth()->login($realUser);
        } else {
            // prefill register page with details
            return redirect('register')->with([
                "platform" => "Discord",
                "email" => $callbackUser->email,
            ]);
        }
    }
}
