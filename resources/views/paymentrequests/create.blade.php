@extends('layouts/page')

@section('create', 'Home')

@section('content')
<div id="bg_img" style="background-image: url(../img/header-bg.jpg)">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Add a new paymentrequest
                </div>

                <div class="card-body">
                    <form method="POST" action="/paymentrequest/create" id="form">
						{{csrf_field() }}
						<input type="hidden" name="account_id" required value="$account->id">

						<div class="form-group">
							<label for="user">User</label>
							<select name="to_user_id">
								@foreach($accounts as $account)
									<option value="{{ $account->ID }}">{{ $account->name }}</option>
								@endforeach
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
								@foreach($accounts as $account)
									<option value="{{ $account->ID }}">{{ $account->name }}</option>
								@endforeach
							</select>
							@if( $errors->has('currencies_id'))
								<div class="alert alert-danger">
									{{ $errors->first('currencies_id') }}
									
								</div>
							@endif
						</div>
						<div class="form-group">
							<label for="amount">Amount</label>
							<input type="number" name="amount" required>
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<textarea name="description" required=""></textarea>
						</div>
						<div class="form-group">
							<label for="request_type">Request type</label>
						
							<select name="request_type">
								<option value="payment">Payment</option>
								<option value="donation">Donation</option>
							</select>
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