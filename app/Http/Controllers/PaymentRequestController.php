<?php

namespace App\Http\Controllers;

use App\PaymentRequest;
use Illuminate\Http\Request;
use App\Account;
use Auth;

class PaymentRequestController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$accounts = Account::all()->where('user_id', Auth::user()->id);

        return view('paymentrequest.create', compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        PaymentRequest::create([
            'to_user_id'=>             request('account'),
            'currency_id'=>            request('currency'),
            'requested_amount'=>    request('amount'),
            'description'=>         request('description'),
            'request_type'=>        request('request_type')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentRequest  $paymentRequest
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentRequest $paymentRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentRequest  $paymentRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentRequest $paymentRequest)
    {
        
        $request = PaymentRequest::find($paymentRequest);
        return view('paymentrequest.update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentRequest  $paymentRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentRequest $paymentRequest)
    {
        $request = PaymentRequest::find($paymentRequest);

        $request->to_user = request('');
        $request->deposit_account_ID = request('account');
        $request->currency = request('currency');
        $request->requested_amount = request('amount');
        $request->paymenturl = "aars";
        $request->description = request('description');
        $request->request_type = request('request_type');

        $request->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentRequest  $paymentRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentRequest $paymentRequest)
    {
        //
    }
}
