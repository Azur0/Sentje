<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Contact;
use App\PaymentRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $friends = Contact::all()->where('user_id', Auth::user()->id);
        $paymentrequests = PaymentRequest::all()->where('to_user_id', Auth::user()->id);

        return view('home', compact(['friends', 'paymentrequests']));
    }
}
