<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Account;
use App\PaymentRequest;

class AccountController extends Controller
{
    private function authFail()
    {
    	return redirect('/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()) {
        	$accounts = Account::all()->where('user_id', Auth::user()->id);

        	return view('accounts.index', compact('accounts'));
        } else {
        	return redirect('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check())
        {
            return view('accounts.create');
        }

        authFail();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if(Auth::check())
        {
            Account::create(array_merge($this->validate(request(), [
                'name' => ['required'],
                'iban' => ['required']
            ]), ['user_id' => Auth::user()->id]));

            return redirect('/accounts');
        }
        else
        {
           authFail();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check())
        {
        	$account = Account::all()->where('id', $id)->first();
        	$paymentrequests = PaymentRequest::all()->where('to_user_id', Auth::user()->id);

        	if($account->user = Auth::user()->id)
        	{
				return view('accounts.show',compact('account','paymentrequests'));
        	}
        }
        else
        {
        	authFail();
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        if(Auth::check())
        {
            if($account->user_id == Auth::user()->id)
            {
                return view('accounts.edit', compact('account'));
            }
            else
            {
                return redirect('/accounts');
            }
        }
        else
        {
            authFail();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Account $account)
    {
        $account->update(request(['name', 'iban']));

        return redirect('/accounts');
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Account $account)
    {
        $paymentrequests = PaymentRequest::all()->where('created_by_user_id', Auth::user()->id);

        if(Auth::check())
        {
            if($account->user_id == Auth::user()->id)
            {
                return view('accounts.delete', compact(['account', 'paymentrequests']));
            }
            else
            {
                return redirect('/accounts');
            }
        }
        else
        {
            authFail();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
