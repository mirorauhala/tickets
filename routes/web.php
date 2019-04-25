<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

/*
|--------------------------------------------------------------------------
| Basic routes
|--------------------------------------------------------------------------
*/
Route::get('/',                 'FeaturedEventController@index')->name('events');

Route::get('/tickets',          'TicketController@index')->name('tickets');
Route::get('/tickets/{item}',   'TicketController@show')->name('tickets.show');

/*
|--------------------------------------------------------------------------
| Orders
|--------------------------------------------------------------------------
*/

Route::get('/orders',               'OrderController@index')->name('orders');
Route::get('/orders/create',        'OrderController@create')->name('orders.create');
Route::post('/orders/create',       'OrderController@store');
Route::get('/orders/{order}',       'OrderController@show')->name('orders.show');
Route::delete('/orders/{order}',    'OrderController@delete')->name('orders.delete');

/*
|--------------------------------------------------------------------------
| Event
|--------------------------------------------------------------------------
*/

Route::get('/events',           'EventController@index')->name('events.index');
Route::get('/events/{event}',   'EventController@show')->name('events.show');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');

// Customers
Route::get('/dashboard/{event}', 'Dashboard\DashboardController@customers')->name('dashboard.show');
Route::get('/dashboard/{event}/customers', 'Dashboard\DashboardController@customers')->name('dashboard.customers');

// Orders
Route::get('/dashboard/{event}/orders', 'Dashboard\DashboardController@orders')->name('dashboard.orders');

// Maps
Route::group(['namespace' => 'Dashboard', 'prefix' => '/dashboard/{event}', 'as' => 'dashboard.'], function() {
    Route::resource('tickets', 'TicketsController');
    Route::resource('maps', 'MapsController');
});

// Settings
Route::get('/dashboard/{event}/settings', 'Dashboard\EventController@show')->name('dashboard.settings');
Route::post('/dashboard/{event}/settings', 'Dashboard\EventController@update');

/*
|--------------------------------------------------------------------------
| Settings
|--------------------------------------------------------------------------
*/

Route::get('/order/callback', 'Order\OrderController@processOrderCallback')->name('orders.callback');
Route::post('/order/{order}/addSeats', 'Order\OrderSeatController@addSeatToOrderItems')->name('order.seats');
Route::group(['prefix' => '/settings', 'namespace' => 'Settings'], function () {
    Route::get('/', 'ProfileController@showSettings')->name('settings');
    Route::post('/', 'ProfileController@updateProfile');
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

    return redirect()->route('events');
})->name('lang');
