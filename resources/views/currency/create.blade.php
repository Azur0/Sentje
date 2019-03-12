@extends('layouts/page')

@section('title', 'currency - create')

@section('content')
	<form id="form" action="/" method="POST">
		@csrf
		<div class="form_row">
		<label>currency</label><input type="text" name="currency">

			<div class="error">{{ $errors->first('currency') }}</div>
		</div>

		<div class="form_row_buttons">
			<input type="submit" name="submit">
			<a href="/currency">cancel</a>
		</div>
	</form>
	
@endsection