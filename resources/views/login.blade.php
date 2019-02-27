@extends('layouts/page')

@section('title', 'Home')

@section('content')
<div id="bg_img">
	<form id="form_login">
		<div class="form_fields">
			<label for="email">Email</label><input type="email" name="email" required="true">
			<label for="password">Password</label><input type="password" name="password" required="true">
		</div>
		<div class="form_buttons">
			<input class="btn btn-primary btn-xl text-uppercase" type="button" name="login" value="login">
			<a href="./register" class="btn btn-primary btn-xl text-uppercase">register</a>
		</div>
	</form>
</div>

@endsection
