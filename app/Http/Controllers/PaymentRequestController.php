<?php

namespace App\Http\Controllers;

use App\PaymentRequest;
use Illuminate\Http\Request;
use App\Account;
use App\Currency;
use App\User;
use Auth;
use Mollie\Laravel\Facades\Mollie;

class PaymentRequestController extends Controller
{
	public function preparePayment()
	{
		$payment = Mollie::api()->payments()->create([
		'amount' => [
			'currency' => 'EUR', //Currency::select('currency')->where('id', request('currencies_id'))->get(),
			'value' => strval(request('requested_amount')), // You must send the correct number of decimals, thus we enforce the use of strings
		],
		'description' => request('description'),
		'redirectUrl' => route('accounts.index'),
		]);

		$payment = Mollie::api()->payments()->get($payment->id);

		// redirect customer to Mollie checkout page
		return $payment->getCheckoutUrl();
	}


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
		if(Auth::check())
		{

			$contact = null;
			$currencies = Currency::all();
			$account = Account::all()->where('id', $account_id)->where('user_id', Auth::user()->id)->first();
			$users = User::all()->where('id','!=', Auth::user()->id);

			if( isset($_POST['contact_id']) )
			{
				$contact = $_POST['contact_id'];
			}
			return view('paymentrequests.create', compact('account','currencies','contact','users'));
		}
		else
		{
			return redirect('/login');
		}
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
			'account_id' => 'required|integer',
			'to_user_id' => 'nullable|integer',
			'currencies_id' => 'required',
			'requested_amount' => 'required|numeric|gt:0',
			'description' => 'required|min:4',
			'request_type' => ['required','regex:(payment|donation)']
		]);

		$url = $this->preparePayment();
		// foreach($to_users_id as $to_user_id)
		// {

		// }
		PaymentRequest::create([
			'created_by_user_id' =>	Auth::user()->id,
			'to_user_id' =>			request('to_user_id'),
			'deposit_account_id' =>	request('account_id'),
			'currencies_id' =>		request('currencies_id'),
			'requested_amount' =>	request('requested_amount'),
			'description' =>		request('description'),
			'request_type' =>		strtolower(request('request_type')),
			'payment_url' =>		$url
		]);

		redirect('/accounts/'.request('account_id'));
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
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\PaymentRequest  $paymentRequest
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(PaymentRequest $paymentRequest)
	{
		//$mollie->payments->delete("tr_WDqYK6vllg");
	}


}
