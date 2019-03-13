@extends('layouts/page')

@section('title', 'currency')

@section('content')
<div id="bg_img" style="background-image: url(../img/header-bg.jpg)">
	<div id="content">	
		<form id="form" action="/" method="POST">
			@csrf
			<div class="form_row">
				<label>currency</label>
			</div>

			<div class="form_row_buttons">
				<input type="submit" name="submit">
				<a href="/currency">cancel</a>
			</div>
		</form>
	</div>
</div>
@endsection