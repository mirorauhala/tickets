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

Auth::routes();

/*
|--------------------------------------------------------------------------
| Basic routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'EventController@index')->name('events');
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
Route::get('/dashboard/{event}', 'Dashboard\DashboardController@customers')->name('dashboard.show');
Route::get('/dashboard/{event}/customers', 'Dashboard\DashboardController@customers')->name('dashboard.customers');
Route::get('/dashboard/{event}/tickets', 'Dashboard\TicketController@index')->name('dashboard.tickets');
Route::get('/dashboard/{event}/tickets/create', 'Dashboard\TicketController@create')->name('dashboard.tickets.create');
Route::post('/dashboard/{event}/tickets/create', 'Dashboard\TicketController@store');
Route::get('/dashboard/{event}/tickets/{ticket}', 'Dashboard\TicketController@show')->name('dashboard.tickets.view');
Route::post('/dashboard/{event}/tickets/{ticket}', 'Dashboard\TicketController@update');
Route::get('/dashboard/{event}/orders', 'Dashboard\DashboardController@orders')->name('dashboard.orders');
Route::get('/dashboard/{event}/maps', 'Dashboard\MapsController@index')->name('dashboard.maps');
Route::get('/dashboard/{event}/seats', 'Dashboard\DashboardController@seats')->name('dashboard.seats');
Route::get('/dashboard/{event}/settings', 'Dashboard\DashboardController@settings')->name('dashboard.settings');

/*
|--------------------------------------------------------------------------
| Ticket purchase routes
|--------------------------------------------------------------------------
*/

Route::get('/order/callback', 'Order\OrderController@processOrderCallback')->name('orders.callback');
Route::post('/order/{order}/addSeats', 'Order\OrderSeatController@addSeatToOrderItems')->name('order.seats');

/*
|--------------------------------------------------------------------------
| Settings
|--------------------------------------------------------------------------
*/
Route::get('/settings', 'User\Settings\ProfileController@showSettings')->name('settings');
Route::post('/settings', 'User\Settings\ProfileController@updateProfile');

Route::get('/settings/password', 'User\Settings\PasswordController@showPasswordForm')->name('settings.password');
Route::post('/settings/password', 'User\Settings\PasswordController@updatePassword');

Route::get('/settings/language', 'User\Settings\LanguageController@show')->name('settings.language');
Route::post('/settings/language', 'User\Settings\LanguageController@update');
