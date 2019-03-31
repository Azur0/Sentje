<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Group;
use App\User;
use App\GroupHasUser;

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
        if(Auth::check())
        {
            $users = User::all()->where('id','!=', Auth::user()->id);

            return view('group.create', compact('users'));
        } else {
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
			'name' => ['required', 'max:45'],
			'to_users_id' => 'required',
		]);

		$current = Group::create([
			'owner_id' =>	Auth::user()->id,
			'groupname' =>	request('name'),
		]);

		$to_users_id = explode(',', request('to_users_id'));

		foreach($to_users_id as $to_user_id)
		{
			GroupHasUser::create([
                'group_id' => $current->id,
                'user_id' => $to_user_id
            ]);
		}

        return redirect('/group');
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
        $this->validate(request(), [
			'name' => ['required', 'max:45'],
			'to_users_id' => 'required',
		]);
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
