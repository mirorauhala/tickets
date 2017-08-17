<?php

namespace Tikematic\Http\Controllers\User;

use Auth;
use Hash;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Tikematic\Http\Requests\SettingsPasswordRequest;
use Tikematic\Http\Controllers\Controller;

class SettingsController extends Controller
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

    /**
     * Show the password change form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLanguages()
    {
        return view('settings.languages');
    }

    /**
     * Update user language.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateLanguage(Request $request)
    {

        $this->validate($request, [
            'display_language' => [
                Rule::in(['none', 'fi', 'en']),
            ],
        ]);

        $user = Auth::user();
        $user->language = $request->display_language;
        $user->save();

        return redirect()
            ->route('settings.language')
            ->with([
                "flash_status" => "success",
                "flash_message" => Helper::tra('settings.flash.language', [], $request->language),
            ]);
    }
}
