@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Add a new account
                </div>

                <div class="card-body">
                    <form id="form" action="/accounts" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="iban">IBAN</label>
                            <input type="text" class="form-control" id="iban" name="iban" placeholder="IBAN">
                        </div>
                        <button type="submit" class="btn btn-primary">Add account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
