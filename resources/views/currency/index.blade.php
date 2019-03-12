@extends('layouts/page')

@section('title', 'currency - overview')

@section('content')
	
	<div>
		<a href="/currency/create">new</a>
	</div>
	<ul>
	@if($currencies->count())
		@foreach($currencies as $currency)
			<li>
				<span>{{$currency->currency}}</span><a href="/currency/{{$currency->id}}/update"></a><a href="/currency/{{$currency->id}}/delete"></a>
			</li>
		@endforeach
		</ul>
	@else
		<h1>geen mcurrencies dus dan maar met eieren betalen</h1>
	@endif
@endsection