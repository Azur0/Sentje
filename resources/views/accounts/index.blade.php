@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header">
                    My Accounts
                    <a href="/accounts/create">
                        <i class="fas fa-plus-square" style="font-size: 30px; vertical-align: middle; float:right;"></i>
                    </a>
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
                        @foreach ($accounts as $account)
                            <tr>
                                <?=
                                    '<td>' . $account->name . '</td></br>
                                    <td>' . $account->iban . '</td>' .
                                ?>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
