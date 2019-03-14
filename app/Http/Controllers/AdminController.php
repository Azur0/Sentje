<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
	if( Auth::user()->role_id == 2 )
	{
		$currency = Currency::find($id);
		return view('admin.index');
	}
	else
	{
		redirect('/');
	}
}
