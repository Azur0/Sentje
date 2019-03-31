@extends('layouts/page')

@section('create', 'account')

@section('content')
<div id="bg_img" style="background-image: url(/../img/header-bg.jpg)">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card" style="margin-bottom: 50px;">
					<div class="card-header">
						{{ $account->name }}: Payment Requests: {{ $paymentrequest->description }}
					</div>
					<div class="card-body">
						
						<form class="" action="/accounts/{{ $paymentrequest->deposit_account_id }}/paymentrequest/{{ $paymentrequest->id }}/delete" method="post">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-primary" style="background-color: red;">Delete account</button>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection