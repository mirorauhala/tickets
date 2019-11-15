<?php

namespace App\Http\Controllers\Settings;

use Domain\User\UserData;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAccountRequest;
use Domain\User\Actions\UpdateUserAction;

class AccountController extends Controller
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
     * Show user's account editing view.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('settings.account');
    }

    /**
     * Update account data.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(UserAccountRequest $request, UpdateUserAction $updateUserAction)
    {
        $userData = UserData::fromRequest($request);

        $updateUserAction->run($request->user(), $userData);

        return redirect()
            ->route('settings')
            ->with([
                'flash_status'  => 'success',
                'flash_message' => tra('settings.flash.account', [], $request->language),
            ]);

    }
}
