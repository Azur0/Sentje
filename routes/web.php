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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/overview', 'PaymentRequestController@getOverview');

Route::get('/paymentrequest/create', 'PaymentRequestController@create');
Route::post('/paymentrequest/create', 'PaymentRequestController@create');
Route::get('/paymentrequest/{{paymentrequest}}', 'PaymentRequestController@show');
Route::delete('/paymentrequest/{{paymentrequest}}', 'PaymentRequestController@destroy');
Route::patch('/paymentrequest/{{paymentrequest}}', 'PaymentRequestController@update');
Route::get('/paymentrequest/{{paymentrequest}}/edit', 'PaymentRequestController@edit');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('currency', 'CurrencyController');

Route::resource('payments', 'PaymentController');

Route::resource('accounts', 'AccountController');
Route::get('accounts/{account}/delete', 'AccountController@delete');

Route::get('/admin', 'AdminController@index');

