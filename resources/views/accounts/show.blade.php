@extends('layouts/page')

@section('create', 'account')

@section('content')
<div id="bg_img" style="background-image: url(../img/header-bg.jpg)">
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card" style="margin-bottom: 50px;">
	                <div class="card-header">
	                    {{ $account->name }}
	                </div>

	                <div class="card-body">
	                    <table class="table table-hover">
	                        <thead>
	                            <tr>
	                                <th scope="col">Account Name</th>
	                                <th scope="col">IBAN Number</th>
	                                <th scope="col" style="text-align: center;"><i class="fas fa-cog" style="font-size: 20px; vertical-align: middle; color: #D8D8D8;"></i></th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <tr>
	                                <td>{{ $account->name }}</td>
	                                <td>{{ $account->iban }}</td>
	                                <td class="text-center">
	                                    <a href="{{ url("/accounts/$account->id/edit") }}"><i class="fas fa-edit" style="font-size:20px; margin-right: 10px; color:#2578AF;"></i></a>
	                                    <a href="{{ url("/accounts/$account->id/delete") }}"><i class="fas fa-trash-alt" style="font-size:20px; color:red;"></i></a>
	                                </td>
	                            </tr>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	        <div class="col-md-8">
	        	<div class="card" style="margin-bottom: 50px;">
	                <div class="card-header">
	                    My payment requests
	                    <a href="/paymentrequests/create">
	                        <i class="fas fa-plus-square" style="font-size: 30px; vertical-align: middle; float:right;"></i>
	                    </a>
	                </div>

	                <div class="card-body">
	                    <table class="table table-hover">
	                        <thead>
	                            <tr>
	                                <th scope="col">User</th>
	                                <th scope="col">Amount</th>
	                                <th scope="col">Date Filed</th>
	                                <th scope="col">status</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        @foreach ($paymentrequests as $paymentrequest)
	                            <tr>
	                                <td>{{ $paymentrequest->to_user_id }}</td>
	                                <td>{{ $paymentrequest->requested_amount }}</td>
	                                <td>{{ \Carbon\Carbon::parse($paymentrequest->created_at)->format('d/m/Y') }}</td>
	                                <td>{{ $paymentrequest->status }}</td>
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