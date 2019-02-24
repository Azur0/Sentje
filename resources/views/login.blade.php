@extends('layouts/page')

@section('title', 'Home')

@section('content')

<div id="form_login">
	<label>email</label><input type="email" name="email" required="true">
	<label>password</label><input type="password" name="password" required="true">
	<div>
		<input type="button" name="login" value="login">
	</div>
</div>

@endsection
