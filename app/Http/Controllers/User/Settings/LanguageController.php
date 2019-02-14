<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLanguageRequest;

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
    public function update(UpdateLanguageRequest $request)
    {
        $request->user()->update([
            'language' => $request->language,
        ]);

        return redirect()
            ->route('settings.language')
            ->with([
                'flash_status'  => 'success',
                'flash_message' => tra('settings.flash.language', [], $request->language),
            ]);
    }
}
