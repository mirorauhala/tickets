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
| Socialite
|--------------------------------------------------------------------------
*/
//Route::get('/auth/login/discord', 'Auth\SocialiteController@redirectDiscord')->name('auth.login.discord');
//Route::get('/auth/callback/discord', 'Auth\SocialiteController@callbackDiscord')->name('auth.callback.discord');

/*
|--------------------------------------------------------------------------
| Basic routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'Event\DetailsController@index')->name('event');
Route::get('/tickets', 'User\TicketController@showPaidTickets')->name('tickets');
Route::get('/tickets/pending', 'User\TicketController@showPendingTickets')->name('tickets.pending');
Route::get('/tickets/redeem', 'User\TicketController@showTicketRedeemView')->name('tickets.redeem');
Route::get('/tickets/view/{order}', 'User\TicketController@viewTicket')->name('tickets.view');
Route::get('/tournaments', 'User\TournamentController@index')->name('tournaments');

/*
|--------------------------------------------------------------------------
| Event
|--------------------------------------------------------------------------
*/
Route::get('/event/map', 'Event\MapController@map')->name('events.map');

// view ticket types
Route::get('/event/tickets', 'Event\TicketController@index')->name('events.tickets');
Route::get('/event/tickets/{ticket}', 'Event\TicketController@show')->name('events.tickets.ticket');
Route::post('/event/tickets/{ticket}', 'Order\OrderController@create');

// Tournaments
Route::get('/event/tournaments', 'Event\TournamentController@tournaments')->name('events.tournaments');

// Admin routes
Route::get('/event/admin', 'EventAdmin\OrderController@viewEventOrders')->name('events.admin.orders');

Route::get('/event/admin/tickets', 'EventAdmin\TicketController@viewEventTickets')->name('events.admin.tickets.list');
Route::get('/event/admin/tickets/new', 'EventAdmin\TicketController@viewEventNewTicket')->name('events.admin.tickets.new');
Route::post('/event/admin/tickets/new', 'EventAdmin\TicketController@processEventNewTicket');
Route::get('/event/admin/tickets/edit/{ticket}', 'EventAdmin\TicketController@viewEventEditTicket')->name('events.admin.tickets.edit');
Route::post('/event/admin/tickets/edit/{ticket}', 'EventAdmin\TicketController@processEventEditTicket');

Route::get('/event/admin/maps', 'EventAdmin\MapsController@customers')->name('events.admin.maps');
Route::get('/event/admin/tournaments', 'EventAdmin\TournamentController@tournaments')->name('events.admin.tournaments');
Route::get('/event/admin/prices', 'EventAdmin\CustomerController@customers')->name('events.admin.prices');
Route::get('/event/admin/settings', 'EventAdmin\SettingsController@viewEventSettings')->name('events.admin.settings');
Route::post('/event/admin/settings', 'EventAdmin\SettingsController@processEventSettings');
Route::get('/event/admin/scanner', 'EventAdmin\ScannerController@viewScanner')->name('events.admin.scanner');

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

Route::get('/settings/language', 'User\Settings\LanguageController@showLanguages')->name('settings.language');
Route::post('/settings/language', 'User\Settings\LanguageController@updateLanguage');

Route::get('/settings/orders', 'User\Settings\OrderController@index')->name('settings.orders');
Route::get('/settings/orders/{order}', 'User\Settings\OrderController@show')->name('settings.orders.show');
Route::get('/settings/orders/delete/{order}', 'User\Settings\OrderController@delete')->name('settings.orders.delete');
