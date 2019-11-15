<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;

class SettingsAccountController extends Controller
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
}
