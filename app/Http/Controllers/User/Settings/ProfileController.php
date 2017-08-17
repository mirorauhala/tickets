<?php

namespace Tikematic\Http\Controllers\User\Settings;

use Helper;
use Illuminate\Http\Request;
use Tikematic\Http\Controllers\Controller;

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
    public function updateProfile(Request $request)
    {
        // validate the request
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'street_address' => 'required',
            'postal_code' => 'required',
            'postal_office' => 'required',
            'country_code' => 'required|max:2',
        ]);

        // save the user data
        $user = $request->user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->street_address = $request->street_address;
        $user->postal_code = $request->postal_code;
        $user->postal_office = $request->postal_office;
        $user->country_code = $request->country_code;
        $user->save();

        // return to view with flash message
        return redirect()
            ->route('settings.profile')
            ->with([
                'flash_status' => 'success',
                'flash_message' => Helper::tra('settings.flash.profile'),
            ]);
    }
}
