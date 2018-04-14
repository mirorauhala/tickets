<?php

namespace App\Http\Controllers\User\Settings;

use Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepository;

class ProfileController extends Controller
{
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $user)
    {
        $this->middleware('auth');
        $this->user = $user;
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

        // save profile
        $this->user->update(
            $this->user->authenticated()->id,
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'street_address' => $request->street_address,
                'postal_code' => $request->postal_code,
                'postal_office' => $request->postal_office,
                'country_code' => $request->country_code,
            ]
        );

        // return to view with flash message
        return redirect()
            ->route('settings')
            ->with([
                'flash_status' => 'success',
                'flash_message' => Helper::tra('settings.flash.profile'),
            ]);
    }
}
