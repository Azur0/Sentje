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
                    <form method="POST" action="/accounts/{{$account->id}}/paymentrequests" id="form" enctype="multipart/form-data">
						{{csrf_field() }}
						<input type="hidden" name="account_id" required value="{{$account->id}}">

						<div class="form-group">
							<label for="to_user_id">User</label>
							<select name="to_user_id">
							@if($contact === null )
								<option selected value="-">select a user</option>
								@foreach($users as $user)
									<option value="{{ $user->id }}">{{ $user->name }}</option>
								@endforeach
							@else
								<option value="{{ $contact->id }}">{{ $contact->name }}</option>
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
								<option selected value="-">select a currency</option>
								@foreach($currencies as $currency)
									<option value="{{ $currency->id }}">{{ $currency->currency }}</option>
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
							<input type="text" name="requested_amount" pattern="^\d{1,3}(,\d{3})*(\.\d+)?$" value="{{ old('requested_amount') }}" data-type="currency" placeholder="$1.00" required>
							@if( $errors->has('requested_amount'))
								<div class="alert alert-danger">
									{{ $errors->first('requested_amount') }}
									
								</div>
							@endif
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<textarea name="description" required value="{{ old('description') }}"></textarea>
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
						<div class="form-group">
							<div>
								<label for="request_type">Select Media</label>
								<input type="file" name="media">
								<div id="media"><img src="/public/img/" alt="media"></div>
							</div>
							@if( $errors->has('media'))
								<div class="alert alert-danger">
									{{ $errors->first('media') }}
								</div>
							@endif
						</div>
						<div>
							<input type="submit" name="btn_submit" value="create"><a href="/accounts/{{$account->id}}">cancel</a>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div></div>
@endsection