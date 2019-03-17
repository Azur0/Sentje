@extends('layouts/page')

@section('create', 'Home')

@section('content')
<div id="bg_img" style="background-image: url(/../img/header-bg.jpg)">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Add a new paymentrequest
                </div>

                <div class="card-body">
                    <form method="POST" action="/accounts/{{$account->id}}/paymentrequests" id="form">
						{{csrf_field() }}
						<input type="hidden" name="account_id" required value="{{$account->id}}">

						<div class="form-group">
							<label for="to_user_id">User</label>
							<select name="to_user_id">
							@if($contact === null )
								@foreach($users as $user)
									<option value="{{ $user->ID }}">{{ $user->name }}</option>
								@endforeach
							@else
								<option value="{{ $contact->ID }}">{{ $contact->name }}</option>
							@endif
							</select>
							@if( $errors->has('to_user_id'))
								<div class="alert alert-danger">
									{{ $errors->first('to_user_id') }}
									
								</div>
							@endif
						</div>
						<div class="form-group">
							<label for="currencies_id">Currency</label>
							<select name="currencies_id">
								@foreach($currencies as $currency)
									<option value="{{ $currency->ID }}">{{ $currency->currency }}</option>
								@endforeach
							</select>
							@if( $errors->has('currencies_id'))
								<div class="alert alert-danger">
									{{ $errors->first('currencies_id') }}
									
								</div>
							@endif
						</div>
						<div class="form-group">
							<label for="requested_amount">Amount</label>
							<input type="number" name="requested_amount" min="0" required>
							@if( $errors->has('requested_amount'))
								<div class="alert alert-danger">
									{{ $errors->first('requested_amount') }}
									
								</div>
							@endif
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<textarea name="description" required=""></textarea>
							@if( $errors->has('description'))
								<div class="alert alert-danger">
									{{ $errors->first('description') }}
									
								</div>
							@endif
						</div>
						<div class="form-group">
							<label for="request_type">Request type</label>
						
							<select name="request_type">
								<option value="payment">Payment</option>
								<option value="donation">Donation</option>
							</select>
							@if( $errors->has('request_type'))
								<div class="alert alert-danger">
									{{ $errors->first('request_type') }}
									
								</div>
							@endif
						</div>
						<div>
							<input type="submit" name="btn_submit" value="create"><a href=""></a>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div></div>
@endsection