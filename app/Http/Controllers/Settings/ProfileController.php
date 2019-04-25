<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfileRequest;

class ProfileController extends Controller
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
     * Show the application settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSettings()
    {
        return view('settings.profile');
    }

    /**
     * Update user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(UserProfileRequest $request)
    {
        $request->user()->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
        ]);

        return redirect()
            ->route('settings')
            ->with([
                'flash_status'  => 'success',
                'flash_message' => tra('settings.flash.profile'),
            ]);
    }
}
