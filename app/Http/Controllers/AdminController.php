<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	if(Auth::user()->role == 2)
	{
		$currency = Currency::find($id);
		return view('currency.create', ['currencies' => $currency]);
	}
}
