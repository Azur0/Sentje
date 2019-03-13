@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit account
                </div>

                <div class="card-body">
                    <form id="form" action="/accounts/{{ $account->id }}" method="POST">
                    @csrf
                    @method('PATCH')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $account->name }}">
                        </div>
                        <div class="form-group">
                            <label for="iban">IBAN</label>
                            <input type="text" class="form-control" id="iban" name="iban" placeholder="NL00 1234 5678 90" value="{{ $account->iban }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
