<!--Navbar-->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark red lighten-1 scrolling-navbar">

	<!-- Navbar brand -->
	<a class="navbar-brand" href="{{ url('home') }}"><i class="fas fa-graduation-cap mr-2"></i>Software Educativo</a>

	<!-- Collapse button -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<!-- Collapsible content -->
	<div class="collapse navbar-collapse" id="basicExampleNav">

		<!-- Links -->
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="{{ url('home') }}"><i class="fas fa-home mr-2"></i>Inicio</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#"><i class="fas fa-chart-line mr-2"></i>Progreso</a>
			</li>

			<!-- Dropdown -->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
				aria-expanded="false"><i class="fas fa-user mr-2"></i>{{ $me[0]->type }}</a>
				<div class="dropdown-menu dropdown-menu-right dropdown-dark" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="{{ url('profile') }}">
						<i class="fas fa-user mr-2"></i>Perfil
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#"
						onclick="event.preventDefault();document.getElementById('logout-form').submit();">
						<i class="fas fa-power-off mr-2"></i>Salir
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
				</div>
			</li>

		</ul>
		<!-- Links -->

		{{-- <form class="form-inline">
			<div class="md-form my-0">
				<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
			</div>
		</form> --}}
	</div>
	<!-- Collapsible content -->

</nav>
<!--/.Navbar-->