<?php

namespace App\Http\Controllers;

use App\PaymentRequest;
use Illuminate\Http\Request;
use App\Account;
use App\Currency;
use App\User;
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
    public function create($account_id)
    {
		$contact = null;
		$currencies = Currency::all();
		$account = Account::all()->where('id', $account_id)->where('user_id', Auth::user()->id);
		$users = User::all()->where('id','!=', Auth::user()->id);

		if( isset($_POST['contact_id']) )
		{
			$contact = $_POST['contact_id'];
		}
		return view('paymentrequests.create', compact('accounts','currencies','contact','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'account_id' => 'required',
            'to_user_id' => 'required'.$user->id,
            'currencies_id' => 'required',
            'requested_amount' => 'required',
            'description' => 'required',
            'request_type' => 'required',
        ]);




        foreach($to_users_id as $to_user_id)
        {

        }
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
