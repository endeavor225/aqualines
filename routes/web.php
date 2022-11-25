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
Route::get('/', 'HomeController@index')->name('home');

route::view('/geolocalication', 'geolocalication');
Route::view('/details', 'details')->name('details');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('clients', 'ClientController');
Route::resource('cartes', 'CarteController');
Route::resource('gares', 'GareController');
Route::resource('transactions', 'TransactionController');
Route::resource('caisses', 'CaisseController');
Route::resource('bateaus', 'BateauController');
Route::resource('voyages', 'VoyageController');
Route::resource('recharges', 'RechargeController');
Route::resource('terminals', 'TerminalController');
Route::resource('fonctions', 'FonctionController');
Route::resource('bonus', 'BonusController');
Route::resource('sms', 'SmsController');
Route::resource('utilisateurs', 'UtilisateurController');
Route::resource('periodes', 'PeriodeController');

//================ Transfert ===================
Route::patch('transfert', 'TransfertController@store')->name('transfert');

//================ Graphie ===================
route::get('chartjs', 'ChartjsController@chart');
route::get('charts', 'ChartController@graphe');
route::get('chart', 'HomeController@getMonthlyPostData');
route::get('ajax', 'AjaxController@update');

//Route::get('cartes.create', 'CarteController@create')->name('cartes.create');
// Route::get('cartes.create.id', 'CarteController@create')->name('cartes.create')->except(['create']);

// Route::view('/sms', 'sms');
// Route::post('/sms', 'SmsController@sendSms');

// use Utils\Twilio;

// Route::get('/sens', function () {
//     $from = '+22508474872';
//     $to   = '+22503817840';
//     $body = 'Hello!';
//     $twilio = new Twilio;
//     try {
//         return $twilio->sendSMS($from, $body, $to);
//     } catch (\Throwable $th) {
//         dd($th);
//     }

// });
