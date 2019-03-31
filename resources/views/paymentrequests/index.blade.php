@extends('layouts/page')

@section('create', 'account')

@section('content')
<div id="bg_img" style="background-image: url(/../img/header-bg.jpg)">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card" style="margin-bottom: 50px;">
					<div class="card-header">
						{{ $account->name }}: Payment Requests
						<a href="/accounts/{{ $account->id }}/paymentrequests/create">
							<i class="fas fa-plus-square" style="font-size: 30px; vertical-align: middle; float:right;"></i>
						</a>
					</div>

					<div class="card-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">User</th>
									<th scope="col">Amount</th>
									<th scope="col">Status</th>
									<th scope="col">Date Filed</th>
									<th scope="col" style="text-align: center;"><i class="fas fa-cog" style="font-size: 20px; vertical-align: middle; color: #D8D8D8;"></i></th>
								</tr>
							</thead>
							<tbody>
							@foreach ($paymentrequests as $paymentrequest)
								<tr>
									<td>
										@if (empty($paymentrequest->to_user->name))
											Guest
										@else
											{{ $paymentrequest->to_user->name }}
										@endif
									</td>
									<td>{{ $paymentrequest->requested_amount }} {{ $paymentrequest->currency->currency }}</td>
									<td>{{ $paymentrequest->status }}</td>
									<td>{{ \Carbon\Carbon::parse($paymentrequest->created_at)->format('d/m/Y') }}</td>
									<td class="text-center">
	                                    <a href="/paymentrequest/{{ $paymentrequest->id }}/delete" alt="cancel"><i class="fas fa-ban" style="font-size:20px;"></i></a>
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