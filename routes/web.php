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
Route::get('/', 'EventController@index')->name('events');
Route::get('/all', 'EventController@all')->name('events.all');
Route::get('/tickets', 'User\TicketController@index')->name('tickets');
Route::get('/tickets/redeem', 'User\TicketController@showRedeem')->name('tickets.redeem');
Route::post('/tickets/redeem', 'User\TicketController@processRedeemCode');
Route::get('/tickets/{item}', 'User\TicketController@showTicket')->name('tickets.share');
Route::post('/tickets/redeem/{item}/create', 'User\TicketController@createRedeemCode')->name('tickets.redeem.create');
Route::post('/tickets/redeem/{item}/delete', 'User\TicketController@deleteRedeemCode')->name('tickets.redeem.delete');

/*
|--------------------------------------------------------------------------
| Orders
|--------------------------------------------------------------------------
*/
Route::get('/orders', 'User\OrderController@index')->name('orders');
Route::post('/orders/create/{event}', 'Order\OrderController@create')->name('orders.create');
Route::get('/orders/{order}', 'User\OrderController@show')->name('orders.show');
Route::get('/orders/delete/{order}', 'User\OrderController@delete')->name('orders.delete');

/*
|--------------------------------------------------------------------------
| Event
|--------------------------------------------------------------------------
*/
Route::get('/event/{event}', 'EventController@show')->name('event');

// view ticket types
Route::get('/event/tickets', 'EventController@index')->name('events.tickets');
Route::get('/event/tickets/{ticket}', 'EventController@show')->name('events.tickets.ticket');
Route::post('/event/tickets/{ticket}', 'Order\OrderController@create');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');

// Customers
Route::get('/dashboard/{event}', 'Dashboard\DashboardController@customers')->name('dashboard.show');
Route::get('/dashboard/{event}/customers', 'Dashboard\DashboardController@customers')->name('dashboard.customers');

// Tickets
Route::get('/dashboard/{event}/tickets', 'Dashboard\TicketController@index')->name('dashboard.tickets');
Route::get('/dashboard/{event}/tickets/create', 'Dashboard\TicketController@create')->name('dashboard.tickets.create');
Route::post('/dashboard/{event}/tickets/create', 'Dashboard\TicketController@store');
Route::get('/dashboard/{event}/tickets/{ticket}', 'Dashboard\TicketController@show')->name('dashboard.tickets.view');
Route::post('/dashboard/{event}/tickets/{ticket}', 'Dashboard\TicketController@update');

// Orders
Route::get('/dashboard/{event}/orders', 'Dashboard\DashboardController@orders')->name('dashboard.orders');

// Maps
Route::get('/dashboard/{event}/maps', 'Dashboard\MapsController@index')->name('dashboard.maps');
Route::get('/dashboard/{event}/maps/create', 'Dashboard\MapsController@create')->name('dashboard.maps.create');
Route::post('/dashboard/{event}/maps/create', 'Dashboard\MapsController@store');
Route::get('/dashboard/{event}/maps/{map}', 'Dashboard\MapsController@show')->name('dashboard.maps.edit');
Route::post('/dashboard/{event}/maps/{map}', 'Dashboard\MapsController@update');

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
Route::group(['prefix' => '/settings'], function () {
    Route::get('/', 'User\Settings\ProfileController@showSettings')->name('settings');
    Route::post('/', 'User\Settings\ProfileController@updateProfile');

    Route::get('/password', 'User\Settings\PasswordController@showPasswordForm')->name('settings.password');
    Route::post('/password', 'User\Settings\PasswordController@updatePassword');
    
    Route::get('/language', 'User\Settings\LanguageController@show')->name('settings.language');
    Route::post('/language', 'User\Settings\LanguageController@update');
    
    // Route::get('/two-factor', 'User\Settings\TwoFactorSettingsController@index')->name('settings.two-factor');
    // Route::post('/two-factor/install', 'User\Settings\TwoFactorSettingsController@create');
    // Route::get('/two-factor/view', 'User\Settings\TwoFactorSettingsController@show');
    // Route::get('/two-factor/view', 'User\Settings\TwoFactorSettingsController@store');

    Route::get('/about', 'User\Settings\AboutController')->name('settings.about');
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
