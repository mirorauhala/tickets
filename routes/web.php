<?php


/*
|--------------------------------------------------------------------------
| Basic routes
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers'], function() {
    Auth::routes(['verify' => true]);
});

Route::group(['namespace' => 'Domain\Events\Controllers'], function() {
    Route::get('/', 'FeaturedEventController@index')->name('home');
    Route::resource('/events', 'EventController')->only(['index', 'show']);
});

Route::resource('/tickets', 'Domain\Tickets\Controllers\TicketController')->only(['index', 'show']);
Route::resource('/orders', 'Domain\Orders\Controllers\OrderController')->except(['edit', 'update']);    


Route::group(['prefix' => '/dashboard', 'namespace' => 'Domain\\Dashboard\\Controllers'], function () {
    Route::get('', 'DashboardController@index')->name('dashboard');
    Route::get('/{event}', 'DashboardController@customers')->name('dashboard.show');
    Route::get('/{event}/customers', 'DashboardController@customers')->name('dashboard.customers');
    Route::get('/{event}/orders', 'DashboardController@orders')->name('dashboard.orders');
    Route::group(['prefix' => '/{event}', 'as' => 'dashboard.'], function () {
        Route::resource('tickets', 'DashboardTicketsController');
        Route::resource('tournaments', 'DashboardTournamentsController');
        Route::resource('maps', 'DashboardMapsController');
    });
    Route::get('/{event}/settings', 'DashboardEventController@show')->name('dashboard.settings');
    Route::post('/{event}/settings', 'DashboardEventController@update');
});



/*
|--------------------------------------------------------------------------
| Settings
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => '/settings', 'namespace' => 'Domain\\Users\\Controllers'], function () {
    Route::get('/', 'AccountController@show')->name('settings');
    Route::post('/', 'AccountController@update');

    Route::get('/password', 'PasswordController@showPasswordForm')->name('settings.password');
    Route::post('/password', 'PasswordController@updatePassword');

    Route::get('/language', 'LanguageController@show')->name('settings.language');
    Route::post('/language', 'LanguageController@update');

    Route::get('/about', 'AboutController')->name('settings.about');
});

/*
|--------------------------------------------------------------------------
| Language routes
|--------------------------------------------------------------------------
*/

Route::get('/lang/{lang}', function (Request $request, $lang) {
    if (! in_array($lang, ['fi', 'en'])) {
        return abort(400, 'Language not supported.');
    }

    $request->session()->put('override_language', $lang);

    if ($request->header('referer')) {
        return redirect($request->header('referer'));
    }

    return redirect()->route('home');
})->name('lang');
