@extends('layouts/page')

@section('title', 'Home')

@section('content')
<div id="bg_img">
	
	<form method="POST" action="/paymentrequest/create" id="moc_create_form">
		{{csrf_field() }}

	</form>

</div>
@endsection