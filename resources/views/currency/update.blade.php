@extends('layouts/page')

@section('title', 'currency - create')

@section('content')
<div id="bg_img" style="background-image: url(../img/header-bg.jpg)">
	<div id="content">
		<form id="form" action="/" method="POST">
			@csrf
			@method('patch')

			<div class="form_row">
			<label>currency</label><input type="text" name="currency" value={{ $currency->currency }}>
				@if($currencies->count())
				<div class="error">{{ $errors->first('currency') }}</div>
				@endif
			</div>

			<div class="form_row_buttons">
				<input type="submit" name="submit">
				<a href="/currency">cancel</a>
			</div>
		</form>
	</div>
</div>
@endsection