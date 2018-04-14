<?php

namespace App\Http\Controllers\User\Settings;

use Helper;
use Illuminate\Http\Request;
use App\Http\Requests\SettingsPasswordRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepository;

class PasswordController extends Controller
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
        // update password
        $this->user->update(
            $this->user->authenticated()->id,
            ["password" => $request->new_password]
        );

        // return to view with flash message
        return redirect()
            ->route('settings.password')
            ->with([
                "flash_status" => "success",
                "flash_message" => Helper::tra('settings.flash.password'),
            ]);
    }
}
