@extends('layouts/page')

@section('title', 'Home')

@section('content')
<div id="bg_img" style="background-image: url(../img/header-bg.jpg)">
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-7">
	            <div class="card" style="margin-bottom: 50px;">
	                <div class="card-header">Dashboard</div>

	                <div class="card-body">
	                    @if (session('status'))
	                        <div class="alert alert-success" role="alert">
	                            {{ session('status') }}
	                        </div>
	                    @endif

	                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						Integer pharetra massa ac viverra dignissim. Cras eu quam rhoncus
						est egestas aliquet. Aliquam aliquet in leo sed lobortis. In hac habitasse
						platea dictumst. Pellentesque eu efficitur turpis. Aliquam orci velit, viverra
						in augue eget, vestibulum ultricies lacus. In hac habitasse platea dictumst.
						Pellentesque ante leo, accumsan nec metus a, varius dapibus mi. Duis ut pharetra lectus.
	                </div>
	            </div>
				<div class="card">
	                <div class="card-header">Incoming requests</div>

	                <div class="card-body">
	                    @if (session('status'))
	                        <div class="alert alert-success" role="alert">
	                            {{ session('status') }}
	                        </div>
	                    @endif

	                    <ul>
	                    @if ($paymentrequests->count())
	                        @foreach ($paymentrequests as $paymentrequest)
	                            <li>
	                                <?= $paymentrequest->description ?>
									<span class="float-right"><a href="{{ $paymentrequest->payment_url }}"><i class="fas fa-hand-holding-usd" style="font-size: 30px; margin-right: 20px;"></i></a></span>
	                            </li>
	                        @endforeach
	                    @else
	                        <p>No incoming requests</p>
	                    @endif
	                    </ul>

	                </div>
	            </div>
	        </div>
	        <div class="col-md-4">
	            <div class="card">
	                <div class="card-header">Contacts</div>

	                <div class="card-body">
	                    <table class="table table-hover">
	                        <tbody>
	                            @foreach ($friends as $friend)
	                                <tr>
	                                    <td>
	                                        <span style="vertical-align: middle;">{{ $friend->user_id1 . ' ' . $friend->user1->name }}</span><span class="float-right"><a href=""><i class="fas fa-plus-square" style="font-size: 30px; vertical-align: middle;"></i></a></span>
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
