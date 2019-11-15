<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLanguageRequest;
use Domain\User\Actions\UpdateLanguageAction;

class LanguageController extends Controller
{
    protected $user;

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
     * Show the language update view.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('settings.languages');
    }

    /**
     * Update user's language.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLanguageRequest $request, UpdateLanguageAction $action)
    {
        $action->run($request->user(), $request->language);

        return redirect()
            ->route('settings.language')
            ->with([
                'flash_status'  => 'success',
                'flash_message' => tra('settings.flash.account'),
            ]);
    }
}
