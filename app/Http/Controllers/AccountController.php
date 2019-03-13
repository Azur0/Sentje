<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Account;
use App\PaymentRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::all()->where('user_id', Auth::user()->id);
        $paymentrequests = PaymentRequest::all()->where('to_user_id', Auth::user()->id);

        return view('accounts.index', compact(['accounts', 'paymentrequests']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()) {
            return view('accounts.create');
        }

        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if(Auth::check()) {
            Account::create(array_merge($this->validate(request(), [
                'name' => ['required'],
                'iban' => ['required']
            ]), ['user_id' => Auth::user()->id]));

            return redirect('/accounts');
        } else {
            return redirect('/');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        if(Auth::check()) {
            if($account->user_id == Auth::user()->id) {
                return view('accounts.edit', compact('account'));
            } else {
                return redirect('/accounts');
            }
        } else {
            return redirect('/');
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

        if(Auth::check()) {
            if($account->user_id == Auth::user()->id) {
                return view('accounts.delete', compact(['account', 'paymentrequests']));
            } else {
                return redirect('/accounts');
            }
        } else {
            return redirect('/');
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
