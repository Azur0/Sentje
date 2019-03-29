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
	public function preparePayment($amount)
	{
		$payment = Mollie::api()->payments()->create([
		'amount' => [
			'currency' => 'EUR', //Currency::select('currency')->where('id', request('currencies_id'))->get(),
			'value' => strval($amount), // You must send the correct number of decimals, thus we enforce the use of strings
		],
		'description' => request('description'),
		'redirectUrl' => route('succes'),
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
	public function index($account_id)
	{
		if(Auth::check())
		{
			$account = Account::all()->where('id', $account_id)->where('user_id', Auth::user()->id)->first();
			$paymentrequests = PaymentRequest::all()->where('created_by_user_id', Auth::user()->id)->where('deposit_account_id', $account_id);

			if($account->user_id == Auth::user()->id)
			{
				return view('paymentrequests.index', compact('account','paymentrequests'));
			}
			else
			{
				redirect('/accounts');
			}
		}
		else
		{
			redirect('/login');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\PaymentRequest  $paymentRequest
	 * @return \Illuminate\Http\Response
	 */
	public function show($account_id, PaymentRequest $paymentRequest)
	{
		$account = Account::all()->where('id', $account_id)->where('user_id', Auth::user()->id)->first();
		$paymentrequests = PaymentRequest::all()->where('id', $paymentRequest);
		if(Auth::check())
		{
			if($account->user_id == Auth::user()->id)
			{
				return view('paymentrequest.show');
			}
			else
			{
				redirect('/accounts');
			}
		}
		else
		{
			redirect('/login');
		}
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
	public function store(Request $request)
	{
		$this->validate(request(), [
			'account_id' => 'required|integer',
			'to_users_id' => 'nullable',
			'currencies_id' => 'required',
			'requested_amount' => 'required|numeric|gt:0|regex:(^\d{0,10}(\.\d{1,2})$)',
			'description' => 'required|min:4',
			'request_type' => ['required','regex:(payment|donation)'],
			'media' => ['image']
		]);

		//Image
		$name = 'default.gif';
		if ($request->hasFile('media'))
		{
        	$image = $request->file('media');
        	$name = request('account_id').'_'.time().'.'.$image->getClientOriginalExtension();
        	$destinationPath = public_path('/img/paymentrequest_media');
        	$image->move($destinationPath, $name);
    	}

    	$to_users_id = explode(',', request('to_users_id'));
		
		$amount_of_users = sizeof($to_users_id);
		$amount = request('requested_amount');
		
		if($amount_of_users > 0)
		{
			$amount = $amount / $amount_of_users;
		}

		foreach($to_users_id as $to_user_id)
		{
			$url = $this->preparePayment($amount);

			PaymentRequest::create([
				'created_by_user_id' =>	Auth::user()->id,
				'to_user_id' =>			$to_user_id,
				'deposit_account_id' =>	request('account_id'),
				'currencies_id' =>		request('currencies_id'),
				'requested_amount' =>	$amount,
				'description' =>		request('description'),
				'request_type' =>		strtolower(request('request_type')),
				'payment_url' =>		$url,
				'media' =>				$name
			]);
		}
		redirect('/');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\PaymentRequest  $paymentRequest
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(PaymentRequest $paymentRequest)
	{
		$paymentRequest = PaymentRequest::all()->where('id', $paymentRequest);

		if($paymentRequest->created_by_user_id == Auth::user()->id)
		{
			//$mollie->payments->delete("tr_WDqYK6vllg");
		}
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\PaymentRequest  $paymentRequest
	 * @return \Illuminate\Http\Response
	 */
	public function succes(PaymentRequest $paymentRequest)
	{
		$paymentRequest = PaymentRequest::all()->where('id', $paymentRequest)->where('status', 'completed');
		if($paymentRequest !== null)
		{
			return view('paymentrequest.succes', compact('paymentRequest'));
		}
		else
		{
			redirect('/');
		}
	}
}