@extends('layouts/page')

@section('title', 'Home')

@section('content')
<div id="bg_img">
	overview
	<div>
		<div id="avatar"></div>

	</div>

	@foreach($incomingPaymentRequests as $inPaymentRequest)
		{{ $inPaymentRequest->description }}
	@endforeach
</div>
@endsection