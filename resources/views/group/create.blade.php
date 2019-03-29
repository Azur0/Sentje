@extends('layouts/page')

@section('create', 'account')

@section('content')
<div id="bg_img" style="background-image: url(../img/header-bg.jpg)">
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">
	                    Create a new group
	                </div>

	                <div class="card-body">
	                    <form id="form" action="/accounts" method="POST">
	                    @csrf
	                        <div class="form-group">
	                            <label for="name">Group name</label>
	                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
	                            @if( $errors->has('to_user_id'))
									<div class="alert alert-danger">
										{{ $errors->first('to_user_id') }}
									</div>
								@endif 
	                        </div>
	                        <div class="form-group">
								<label>users</label>
								<div id="select_user" class="row">
									
									<input type="hidden" name="to_users_id" value="">
									<div id="all_users" class="col-5">
										@foreach($users as $user)
											<div class="user"><span>{{ $user->id }}</span>{{ $user->name }}</div>
										@endforeach
									</div>
									<div id="buttons" class="col-sm">
										<input type="button" name="allin" value=">>">
										<input type="button" name="in" value=">">
										<input type="button" name="out" value="<">
										<input type="button" name="allout" value="<<">
									</div>
									<div id="paymentrequest_reciever" class="col-5">
										
									</div>
								</div>
								@if( $errors->has('to_user_id'))
									<div class="alert alert-danger">
										{{ $errors->first('to_user_id') }}
										
									</div>
								@endif
							</div>
	                        <button type="submit" class="btn btn-primary">Create group</button>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection
