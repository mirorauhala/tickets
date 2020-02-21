<?php

namespace Domain\Users\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLanguageRequest;
use Domain\Users\Actions\UpdateLanguageAction;
use Domain\Users\ViewModels\LanguageViewModel;

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

        $viewModel = new LanguageViewModel(
            $request->user(),
            $request->user()->language
        );

        return redirect()
            ->route('settings.language')
            ->with([
                'flash_status'  => 'success',
                'flash_message' => tra('settings.flash.account'),
            ]);
    }
}
