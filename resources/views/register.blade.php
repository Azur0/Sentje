@extends('layouts/page')

@section('title', 'Home')

@section('content')
<div id="banner"></div>
<div id="form_login">
	<form>
		<label for="username">Email</label><input type="text" name="username" required="true">
		<label for="email">Email</label><input type="email" name="email" required="true">
		<label for="password">Password</label><input type="password" name="password" required="true">
		<label for="password2">Password</label><input type="password" name="password2" required="true">
		<div>
		<div>
			<input class="btn btn-primary btn-xl text-uppercase" type="button" name="login" value="login">
			<a href="./register" class="btn btn-primary btn-xl text-uppercase">register</a>
		</div>
	</form>
</div>
@endsection
