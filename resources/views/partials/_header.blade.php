<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
	<div class="container con-target">
	<div class="row">
				<div class="col">
						<a class="navbar-brand js-scroll-trigger" href="/">Sentje</a>
						<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
							Menu
							<i class="fas fa-bars"></i>
						</button>
				</div>
				<div class="col">
					
					@guest
						<div class="collapse navbar-collapse" id="navbarResponsive">
						<ul class="navbar-nav text-uppercase ml-auto">
							<li class="nav-item">
								<a class="nav-link-custom js-scroll-trigger" href="{{ url('login') }}">{{ __('Login') }}</a>
							</li>
							@if (Route::has('register'))
							<li class="nav-item">
								<a class="nav-link-custom js-scroll-trigger" href="{{ url('register') }}">{{ __('Register') }}</a>
							</li>
							@endif
						</ul>
						</div>
					@else
						<div class="collapse navbar-collapse" id="navbarResponsive">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }} <span class="caret"></span>
							</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('logout') }}"
										 onclick="event.preventDefault();
																	 document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
									</form>
							</div>
						</div>
					@endguest
				</div>
		</div>
	</div>
</nav>
