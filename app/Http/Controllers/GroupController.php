<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Group;
use App\User;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()) {
        	$groups = Group::all()->where('owner_id', Auth::user()->id);

        	return view('group.index', compact('groups'));
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
        $users = User::all()->where('id','!=', Auth::user()->id);

        if(Auth::check())
        {
            return view('group.create', compact('users'));
        } else {
            return redirect('/');
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
			'name' => 'required',
			'to_users_id' => 'required',
		]);

		Group::create([
			'owner_ID' =>	Auth::user()->id,
			'groupname' =>	request('name'),
		]);

		$to_users_id = explode(',', request('to_users_id'));

		foreach($to_users_id as $to_user_id)
		{
			//GroupHasUser::create(['group_id','user_id'])
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
    public function edit($id)
    {
        if(Auth::check())
        {
            $users = User::all()->where('id','!=', Auth::user()->id);
            $group = Group::find($id);
            
            if($group->owner_id == Auth::user()->id)
            {
                return view('group.edit', compact('users', 'group'));
            }
            else
            {
                return redirect('/group');
            }
        }
        else
        {
            return redirect('/login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Group::destroy($id);

        return redirect('/group');
    }
}
