<?php

namespace Tikematic\Http\Controllers\User\Settings;

use Auth;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Tikematic\Http\Controllers\Controller;

class LanguageController extends Controller
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
     * Show the language update view.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLanguages()
    {
        return view('settings.languages');
    }

    /**
     * Update user's language.
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
