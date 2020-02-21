<?php


/*
|--------------------------------------------------------------------------
| Basic routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'Domain\Events\Controllers\FeaturedEventController@index')->name('home');
Route::resource('/events', 'Domain\Events\Controllers\EventController')->only(['index', 'show']);

Route::group(['namespace' => 'App\Http\Controllers'], function() {

    Auth::routes(['verify' => true]);

Route::resource('/tickets', 'TicketController')->only(['index', 'show']);
Route::resource('/orders', 'OrderController')->except(['edit', 'update']);

/*
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
 */
Route::group(['prefix' => '/dashboard'], function () {
    Route::get('', 'Dashboard\DashboardController@index')->name('dashboard');
    Route::get('/{event}', 'Dashboard\DashboardController@customers')->name('dashboard.show');
    Route::get('/{event}/customers', 'Dashboard\DashboardController@customers')->name('dashboard.customers');
    Route::get('/{event}/orders', 'Dashboard\DashboardController@orders')->name('dashboard.orders');
    Route::group(['namespace' => 'Dashboard', 'prefix' => '/{event}', 'as' => 'dashboard.'], function () {
        Route::resource('tickets', 'TicketsController');
        Route::resource('tournaments', 'TournamentsController');
        Route::resource('maps', 'MapsController');
    });
    Route::get('/{event}/settings', 'Dashboard\EventController@show')->name('dashboard.settings');
    Route::post('/{event}/settings', 'Dashboard\EventController@update');
});

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
