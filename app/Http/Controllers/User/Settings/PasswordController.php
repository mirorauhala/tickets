<?php

namespace Tikematic\Http\Controllers\User\Settings;

use Auth;
use Hash;
use Helper;
use Illuminate\Http\Request;
use Tikematic\Http\Requests\SettingsPasswordRequest;
use Tikematic\Http\Controllers\Controller;

class PasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the password change form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPasswordForm()
    {
        return view('settings.password');
    }

    /**
     * Update user password.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(SettingsPasswordRequest $request)
    {

        // get the user model
        $user = Auth::user();

        // update the password
        $user->password = $request->new_password;
        $user->save();

        // return to view with flash message
        return redirect()
            ->route('settings.password')
            ->with([
                "flash_status" => "success",
                "flash_message" => Helper::tra('settings.flash.password'),
            ]);
    }
}
