@extends('layouts/page')

@section('title', 'currency - overview')

@section('content')
<div id="bg_img" style="background-image: url(../img/header-bg.jpg)">
	<div id="content">
		<div>
			<a href="/currency/create">new</a>
		</div>
		<div>
			@if($currencies->count())
				<ul>
				@foreach($currencies as $currency)
					<li>
						<span>{{$currency->currency}}</span><a href="/currency/{{$currency->id}}/update"></a><a href="/currency/{{$currency->id}}/delete"></a>
					</li>
				@endforeach
				</ul>
			@else
				<p>geen currencies dus dan maar met eieren betalen</p>
			@endif
		</div>
	</div>
</div>
@endsection