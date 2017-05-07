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
Route::get('/event/maps', 'Event\MapController@maps')->name('events.maps');
Route::get('/event/tickets', 'Event\TicketController@tickets')->name('events.tickets');
Route::get('/event/tournaments', 'Event\TournamentController@tournaments')->name('events.tournaments');


// Admin routes

Route::get('/event/admin', 'EventAdmin\CustomerController@customers')->name('events.admin.customers');
Route::get('/event/admin/maps', 'EventAdmin\CustomerController@customers')->name('events.admin.maps');
Route::get('/event/admin/tournaments', 'EventAdmin\TournamentController@tournaments')->name('events.admin.tournaments');
Route::get('/event/admin/tickets', 'EventAdmin\TicketController@tickets')->name('events.admin.tickets');
Route::get('/event/admin/prices', 'EventAdmin\CustomerController@customers')->name('events.admin.prices');
Route::get('/event/admin/settings', 'EventAdmin\CustomerController@customers')->name('events.admin.settings');



/*
|--------------------------------------------------------------------------
| Ticket purchase routes
|--------------------------------------------------------------------------
*/

Route::post('/order/place', 'Order\OrderController@placeOrder')->name('order.place');
Route::get('/order/{ticket_id}', 'User\TicketController@buy')->name('buy.ticket');


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

Route::get('/settings/transactions', 'User\SettingsController@showTransactions')->name('settings.transactions.all');
Route::get('/settings/transactions/{transaction}', 'User\SettingsController@showSpecificTransaction')->name('settings.transactions.specific');
