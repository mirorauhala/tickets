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
Route::get('/tickets', 'User\TicketController@showPaidTickets')->name('tickets');
Route::get('/tickets/pending', 'User\TicketController@showPendingTickets')->name('tickets.pending');
Route::get('/tickets/redeem', 'User\TicketController@showTicketRedeemView')->name('tickets.redeem');
Route::get('/tickets/view/{order}', 'User\TicketController@viewTicket')->name('tickets.view');

/*
|--------------------------------------------------------------------------
| Event
|--------------------------------------------------------------------------
*/
Route::get('/event/{event}', 'EventController@show')->name('event');
Route::get('/event/map', 'EventController@map')->name('events.map');

// view ticket types
Route::get('/event/tickets', 'EventController@index')->name('events.tickets');
Route::get('/event/tickets/{ticket}', 'EventController@show')->name('events.tickets.ticket');
Route::post('/event/tickets/{ticket}', 'Order\OrderController@create');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

// Get
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/{event}', 'DashboardController@customers')->name('dashboard.show');
Route::get('/dashboard/{event}/customers', 'DashboardController@customers')->name('dashboard.customers');
Route::get('/dashboard/{event}/tickets', 'DashboardController@tickets')->name('dashboard.tickets');
Route::get('/dashboard/{event}/ticket/create', 'Dashboard\TicketController@create')->name('dashboard.tickets.create');
Route::get('/dashboard/{event}/tickets/{ticket}', 'Dashboard\TicketController@show')->name('dashboard.ticket');
Route::get('/dashboard/{event}/orders', 'DashboardController@orders')->name('dashboard.orders');
Route::get('/dashboard/{event}/maps', 'DashboardController@maps')->name('dashboard.maps');
Route::get('/dashboard/{event}/seats', 'DashboardController@seats')->name('dashboard.seats');
Route::get('/dashboard/{event}/settings', 'DashboardController@settings')->name('dashboard.settings');

// Post
Route::post('/dashboard/{event}/tickets', 'Dashboard\TicketController@store');

/*
|--------------------------------------------------------------------------
| Ticket purchase routes
|--------------------------------------------------------------------------
*/

Route::get('/order/callback', 'Order\OrderController@processOrderCallback')->name('order.callback');
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

Route::get('/settings/orders', 'User\Settings\OrderController@index')->name('settings.orders');
Route::get('/settings/orders/{order}', 'User\Settings\OrderController@show')->name('settings.orders.show');
Route::get('/settings/orders/delete/{order}', 'User\Settings\OrderController@delete')->name('settings.orders.delete');
