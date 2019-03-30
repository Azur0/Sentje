@extends('layouts/page')

@section('create', 'Home')

@section('content')
<div id="bg_img" style="background-image: url(/../img/header-bg.jpg)">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Payment Request
				</div>
				<div class="card-body">
					<div>{{ $paymentRequest->created_by_user_id }}</div> {{ $paymentRequest->created_at }}
					<h2>{{ $paymentRequest->requested_amount }} {{ $paymentRequest->currencies_id }}</h2>
					<h2>{{ $paymentRequest->status }}</h2>
					<div>
						{{ $paymentRequest->description }}
					</div>


					@if( $paymentRequest->status == 'success' )
					Thanks for your payment
					<div>
						<img src="/img/paymentrequest_media/{{ $paymentRequest->media }}">
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection