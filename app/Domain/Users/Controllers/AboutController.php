<?php

namespace Domain\Users\Controllers;

use App\Http\Controllers\Controller;

class AboutController extends Controller
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
     * Show the about field of the project at Settings.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('settings.about');
    }
}
