<?php

namespace App\Http\Controllers\User\Settings;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepository;

class LanguageController extends Controller
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

        $this->user->update(
            $this->user->authenticated()->id,
            ['language' => $request->display_language]
        );

        return redirect()
            ->route('settings.language')
            ->with([
                'flash_status'  => 'success',
                'flash_message' => tra('settings.flash.language', [], $request->display_language),
            ]);
    }
}
