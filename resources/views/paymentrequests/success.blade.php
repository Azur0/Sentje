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
					<div>{{ $paymentRequest->id }}</div> {{ $paymentRequest->created_at }}
					<h2>{{ $paymentRequest->currency->currency }}{{ $paymentRequest->requested_amount }} {{ $paymentRequest->currency_id }}</h2>
					<h2>status: {{ $paymentRequest->status }}</h2>
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
