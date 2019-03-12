@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header">
                    My Accounts
                    <i class="far fa-plus-square"></i>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                    @foreach ($accounts as $account)
                        <li>
                            <?= $account->name . '</br>' . $account->iban ?>
                        </li>
                    @endforeach
                    </ul>

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
                                <?= $paymentrequest->payment_url ?>
                            </li>
                        @endforeach
                    @else
                        <p>No incoming requests</p>
                    @endif
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
