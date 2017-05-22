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
Route::get('/tournaments', 'User\TournamentController@index')->name('tournaments');

/*
|--------------------------------------------------------------------------
| Event
|--------------------------------------------------------------------------
*/
Route::get('/event/map/{map}', 'Event\MapController@map')->name('events.map');
Route::get('/event/maps', 'Event\MapController@maps')->name('events.maps');
Route::get('/event/tickets', 'Event\TicketController@tickets')->name('events.tickets');
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

Route::post('/order/view', 'Order\OrderController@viewOrder')->name('order.view');


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

Route::get('/settings/transactions', 'User\Settings\TransactionsController@showTransactions')->name('settings.transactions.all');
Route::get('/settings/transactions/{transaction}', 'User\Settings\TransactionsController@showSpecificTransaction')->name('settings.transactions.specific');
