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
Route::get('/auth/login/discord', 'Auth\SocialiteController@redirectDiscord')->name('auth.login.discord');
Route::get('/auth/callback/discord', 'Auth\SocialiteController@callbackDiscord')->name('auth.callback.discord');

/*
|--------------------------------------------------------------------------
| Basic routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'Event\DetailsController@index')->name('events.details');
Route::get('/tickets', 'User\TicketController@index')->name('tickets');
Route::get('/tickets/{order}', 'User\TicketController@viewTicket')->name('tickets.view');
Route::get('/tournaments', 'User\TournamentController@index')->name('tournaments');

/*
|--------------------------------------------------------------------------
| Event
|--------------------------------------------------------------------------
*/
Route::get('/event/map', 'Event\MapController@map')->name('events.map');
Route::get('/event/tickets', 'Event\TicketController@showTickets')->name('events.tickets');
Route::get('/event/tickets/visitor', 'Event\TicketController@showVisitorTicket')->name('events.tickets.visitor');
Route::post('/event/tickets/visitor', 'Event\TicketController@processVisitorTicket');
Route::get('/event/tickets/gamer', 'Event\TicketController@showGamerTickets')->name('events.tickets.gamer');
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

/*
|--------------------------------------------------------------------------
| Ticket purchase routes
|--------------------------------------------------------------------------
*/

Route::post('/order/new', 'Order\OrderController@createNewOrder')->name('order.new');
Route::get('/order/view/{order}', 'Order\OrderController@viewOrder')->name('order.view');
Route::get('/order/place/gamer', 'Order\OrderController@processGamerOrderPlacement')->name('order.place.gamer');
Route::get('/order/place/visitor', 'Order\OrderController@processVisitorOrderPlacement')->name('order.place.visitor');


/*
|--------------------------------------------------------------------------
| Settings
|--------------------------------------------------------------------------
*/
Route::get('/settings', 'User\SettingsController@showSettings')->name('settings.profile');
Route::post('/settings', 'User\SettingsController@updateProfile');

Route::get('/settings/password', 'User\SettingsController@showPasswordForm')->name('settings.password');
Route::post('/settings/password', 'User\SettingsController@updatePassword');

Route::get('/settings/language', 'User\SettingsController@showLanguages')->name('settings.language');
Route::post('/settings/language', 'User\SettingsController@updateLanguage');

Route::get('/settings/orders', 'User\Settings\OrderController@showOrders')->name('settings.orders.all');
Route::get('/settings/orders/{order}', 'User\Settings\OrderController@showSpecificOrder')->name('settings.orders.specific');
