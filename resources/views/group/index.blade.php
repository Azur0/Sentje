@extends('layouts/page')

@section('title', 'Home')

@section('content')
    <div id="bg_img" style="background-image: url(../img/header-bg.jpg)">
    	<div class="container">
    	    <div class="row justify-content-center">
    	        <div class="col-md-8">
    	            <div class="card" style="margin-bottom: 50px;">
    	                <div class="card-header">
    	                    My Groups
    	                    <a href="/group/create">
    	                        <i class="fas fa-plus-square" style="font-size: 30px; vertical-align: middle; float:right;"></i>
    	                    </a>
    	                </div>

    	                <div class="card-body">
    	                    <table class="table table-hover">
    	                        <thead>
                                    <tr>
    	                                <th scope="col">Group Name</th>
                                        <th></th>
                                        <th scope="col" style="text-align: center;"><i class="fas fa-cog" style="font-size: 20px; vertical-align: middle; color: #D8D8D8;"></i></th>
                                    </tr>
    	                        </thead>
    	                        <tbody>
                                    @foreach ($groups as $group)
                                        <tr>
                                            <td><a href="/group/{{ $group->id }}">{{ $group->groupname }}</a></td>
                                            <td></td>
                                            <td class="text-center">
                                                <a href="{{ url("/group/$group->id/edit") }}"><i class="fas fa-edit" style="font-size:20px; margin-right: 10px; color:#2578AF;"></i></a>
                                                <a href="{{ url("/group/$group->id/delete") }}"><i class="fas fa-trash-alt" style="font-size:20px; color:red;"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
    	                        </tbody>
    	                    </table>
    	                </div>
    	            </div>
    	        </div>
    	    </div>
    	</div>
    </div>
@endsection
