<nav class="navbar navbar-expand-sm bg-light">

	<!-- Links -->
	<ul class="navbar-nav">
		@if (Route::has('login'))
			@auth
	            <li class="nav-link">
					{!! html_entity_decode(link_to_route('question_link','<span class="menu-item-parent">Questions</span>'))  !!}
				</li>
	        @else
	        	<li class="nav-link">
					<a href="{{ route('login') }}">Login</a>
				</li>
				<li class="nav-link">
					<a href="{{ route('register') }}">Register</a>
				</li>
	        @endauth
		@endif
	</ul>

</nav> 