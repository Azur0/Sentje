@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header">
                    Delete account: {{ $account->name }} - {{ $account->iban }}
                </div>

                <div class="card-body">
                    <strong style="color:red;">You have open payment requests to this account. Are you sure you want to delete this account?</strong>

                    <table class="table table-hover" style="margin: 40px 0px;">
                        <thead>
                            <tr>
                                <th scope="col">User</th>
                                <th scope="col">Pending amount</th>
                                <th scope="col">Currency</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paymentrequests as $paymentrequest)
                            <tr>
                                <td>{{ $paymentrequest->to_user_id }}</td>
                                <td>{{ $paymentrequest->requested_amount }}</td>
                                <td>{{ $paymentrequest->currency->currency }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary" style="background-color: red;">Delete account</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
