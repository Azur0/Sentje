<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Group;
use App\User;

class AdminController extends Controller
{
	private function welcome()
	{
		redirect('/');
	}

	public function index()
	{
		if( Auth::user()->role_id == 2 )
		{
			return view('admin.index');
		}
		else
		{
			welcome();
		}
	}

	public function groups()
	{
		if( Auth::user()->role_id == 2 )
		{
			$groups = Group::All();	
			return view('admin.groups', ['groups' => $groups]);
		}
		else
		{
			welcome();
		}
	}

	public function users()
	{
		if( Auth::user()->role_id == 2 )
		{
			$users = User::All();
			return view('admin.users', [ 'users' => $users ]);
		}
		else
		{
			welcome();
		}
	}
/*
	public function currency()
	{
		if( Auth::user()->role_id == 2 )
		{
			redirect('/currency');
		}
		else
		{
			welcome();
		}
	}
*/
	
}
