<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsPasswordRequest;

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
        $request->user()->update([
            'password' => $request->new_password,
        ]);

        return redirect()
            ->route('settings.password')
            ->with([
                'flash_status'  => 'success',
                'flash_message' => tra('settings.flash.password'),
            ]);
    }
}
