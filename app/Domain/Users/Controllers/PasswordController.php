<?php

namespace Domain\Users\Controllers;

use App\Http\Controllers\Controller;
use Domain\Users\Actions\UpdatePasswordAction;
use Domain\Users\Requests\SettingsPasswordRequest;

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
    public function updatePassword(SettingsPasswordRequest $request, UpdatePasswordAction $updatePasswordAction)
    {
        $updatePasswordAction->run($request->user(), $request->new_password);

        $viewModel = new LanguageViewModel([
            'flash_status'  => 'success',
            'flash_message' => tra('settings.flash.password'),
        ]);

        return redirect()
            ->route('settings.password')
            ->with($viewModel);
    }
}
