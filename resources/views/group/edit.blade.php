@extends('layouts/page')

@section('edit', 'group')

@section('content')
<div id="bg_img" style="background-image: url(/../img/header-bg.jpg)">
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">
	                    Edit group: {{ $group->groupname }}
	                </div>

	                <div class="card-body">
	                    <form id="form" action="/accounts" method="POST">
	                    @csrf
	                        <div class="form-group">
	                            <label for="name">Group name</label>
	                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
								{!! $errors->first('name', '<div class="alert alert-danger" style="margin-top: 10px;">:message</div>') !!}
	                        </div>
	                        <div class="form-group">
	                            <label for="iban">Users</label>
								<div class="input-group">
		                            <select class="form-control">
										@foreach ($users as $user)
											<option value="{{ $user->id }}">{{ $user->name }}</option>
										@endforeach
									</select>
									<a href="">
										<i class="fas fa-plus-square" style="font-size: 35px; vertical-align: middle; float:right; margin-left: 15px;"></i>
									</a>
								</div>
	                        </div>
	                        <button type="submit" class="btn btn-primary">Edit group</button>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection
