@extends('layouts/page')

@section('create', 'account')

@section('content')
<div id="bg_img" style="background-image: url(../img/header-bg.jpg)">
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card" style="margin-bottom: 50px;">
	                <div class="card-header">
	                    <b>Add new contact</b>
	                </div>

                    <div class="card-body">
	                    <form id="form" action="/contact" method="POST">
	                    @csrf
	                        <div class="form-group">
	                            <label for="contact">User name</label>
                                <select class="form-control" name="contact">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
	                        </div>
	                        <button type="submit" class="btn btn-primary">Add contact</button>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection
