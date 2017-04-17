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

Route::get('/', 'EventController@index')->name('events.details');
Route::get('/tickets', 'TicketController@index')->name('tickets');
Route::get('/tournaments', 'TournamentController@index')->name('tournaments');

/*
|--------------------------------------------------------------------------
| Event
|--------------------------------------------------------------------------
*/
Route::get('/event/maps', 'EventController@maps')->name('events.maps');
Route::get('/event/tickets', 'EventController@tickets')->name('events.tickets');
Route::get('/event/tournaments', 'EventController@tournaments')->name('events.tournaments');


// Admin routes

Route::get('/event/admin', 'EventAdmin\CustomerController@customers')->name('events.admin.customers');
Route::get('/event/admin/maps', 'EventAdmin\CustomerController@customers')->name('events.admin.maps');
Route::get('/event/admin/tournaments', 'EventAdmin\TournamentController@tournaments')->name('events.admin.tournaments');
Route::get('/event/admin/tickets', 'EventAdmin\CustomerController@customers')->name('events.admin.tickets');
Route::get('/event/admin/prices', 'EventAdmin\CustomerController@customers')->name('events.admin.prices');
Route::get('/event/admin/settings', 'EventAdmin\CustomerController@customers')->name('events.admin.settings');

/*
|--------------------------------------------------------------------------
| Settings
|--------------------------------------------------------------------------
*/
Route::get('/settings', 'SettingsController@showSettings')->name('settings.profile');
Route::post('/settings', 'SettingsController@updateProfile');

Route::get('/settings/password', 'SettingsController@showPasswordForm')->name('settings.password');
Route::post('/settings/password', 'SettingsController@updatePassword');

Route::get('/settings/language', 'SettingsController@showLanguages')->name('settings.language');
Route::post('/settings/language', 'SettingsController@updateLanguage');

Route::get('/settings/transactions', 'SettingsController@showTransactions')->name('settings.transactions.all');
Route::get('/settings/transactions/{transaction}', 'SettingsController@showSpecificTransaction')->name('settings.transactions.specific');
