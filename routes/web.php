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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('currency', 'CurrencyController');

Route::resource('payments', 'PaymentController');

Route::resource('paymentrequests','PaymentRequestController');
Route::get('paymentrequests/{request}/delete', 'PaymentRequestController@delete');

Route::resource('accounts', 'AccountController');
Route::get('accounts/{account}/delete', 'AccountController@delete');

Route::get('/admin', 'AdminController@index');
Route::get('/admin/users', 'AdminController@users');
Route::get('/admin/groups', 'AdminController@groups');

Route::resource('user','UserController');