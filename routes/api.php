<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('prepare-payment', function () {
    $payment = Mollie::api()->payments()->create([
    'amount' => [
        'currency' => 'EUR',
        'value' => '690.42', // You must send the correct number of decimals, thus we enforce the use of strings
    ],
    'description' => 'My first API payment',
    'redirectUrl' => 'http://www.google.nl',
    'method' => 'ideal',
    ]);

    $payment = Mollie::api()->payments()->get($payment->id);
    dd($payment);
    // redirect customer to Mollie checkout page
    return redirect($payment->getCheckoutUrl(), 303);
});
