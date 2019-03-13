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
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Deposit account</th>
                                <th scope="col">Amount</th>
                                <th scope="col" style="text-align: center;"><i class="fas fa-cog" style="font-size: 20px; vertical-align: middle; color: #D8D8D8;"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($paymentrequests as $paymentrequest)
                                <td>{{ $paymentrequest->account }}</td>
                                <td>{{ $paymentrequest->requested_amount }}</td>
                            @endforeach --}}
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary" style="background-color: red;">Delete account</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
