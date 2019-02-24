@extends('layouts/page')

@section('title', 'Home')

@section('content')
<div id="banner"></div>
<div id="form_login">
	<form>
		<label>email</label><input type="email" name="email" required="true">
		<label>password</label><input type="password" name="password" required="true">
		<div>
			<input class="btn btn-primary btn-xl text-uppercase" type="button" name="login" value="login">
		</div>
	</form>
</div>

@endsection
