@extends('layouts/page')

@section('create', 'account')

@section('content')
<div id="bg_img" style="background-image: url(../img/header-bg.jpg)">
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">
	                    Create a new group
	                </div>

	                <div class="card-body">
	                    <form id="form" action="/accounts" method="POST">
	                    @csrf
	                        <div class="form-group">
	                            <label for="name">Group name</label>
	                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
	                        </div>
	                        <div class="form-group">
	                            <label for="iban">Users</label>
	                            <input type="text" class="form-control" id="iban" name="iban" placeholder="NL00 1234 5678 90">
	                        </div>
	                        <button type="submit" class="btn btn-primary">Add account</button>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection
