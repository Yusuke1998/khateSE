<!--Navbar-->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark red lighten-1 scrolling-navbar">

	<!-- Navbar brand -->
	<a class="navbar-brand" href="{{ url('home') }}"><i class="fas fa-graduation-cap mr-2"></i>Derecho Romano</a>

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
			@if ( Auth::user()->type == 'Estudiante' )
				<li class="nav-item">
					<a class="nav-link" href="{{ url('progreso') }}"><i class="fas fa-chart-line mr-2"></i>Progreso</a>
				</li>
			@else
				<li class="nav-item">
					<a class="nav-link" href="{{ url('notas') }}"><i class="fas fa-clipboard-list mr-2"></i>Notas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="modal" href="#temanuevo"><i class="fas fa-plus mr-2"></i>Añadir tema</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="modal" href="#registroeval"><i class="fas fa-bolt mr-2"></i>Registrar evaluación</a>
				</li>
			@endif

			<!-- Dropdown -->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
				aria-expanded="false"><i class="fas fa-user mr-2"></i>{{ $me->type }}</a>
				<div class="dropdown-menu dropdown-menu-right dropdown-dark" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="{{ url('profile') }}">
						<i class="fas fa-user mr-2"></i>Perfil
					</a>
					@if ( Auth::user()->type == 'Profesor' )
						<a class="dropdown-item" href="https://docs.google.com/forms/u/0/d/1ljxTuDGYSjuElImNkafnqu1Vj3DgViMfrzCTV6hy2qY/edit?ntd=1&usp=forms_home&ths=true" target="_blank">
							<i class="fab fa-google mr-2"></i>Crear Evaluación
						</a>
					@endif
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

<!-- Modal añadir tema-->
<div class="modal fade" id="temanuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Añadir tema</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('addtema') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">

					<div class="form-group md-form">
						<i class="fas fa-book prefix"></i>
						<input type="text" name="tema" id="tema" class="form-control" required pattern="^[a-zA-Záéíóú]+(?:\s?[a-zA-Záéíóú]\s?)+$">
						<label for="tema">Tema</label>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn-md btn btn-elegant" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn-md btn btn-danger"><i class="fas fa-save mr-2"></i>Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Modal registrar evaluacion-->
<div class="modal fade" id="registroeval" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Registrar evaluación</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('addeval') }}" method="post">
				@csrf
				<div class="modal-body">

					<div class="form-group md-form">
						<i class="fas fa-link prefix"></i>
						<input type="text" name="link" id="link" class="form-control validate" required pattern="^(http:\/\/|https:\/\/).+">
						<label for="link">Enlace</label>
					</div>

					<div class="form-row mt-3">
						<div class="col md-form">
							<i class="fas fa-book prefix"></i>
							<select class="ml-5 mdb-select dropdown-dark md-form colorful-select" name="topicid" required id="tema">
								<option disabled selected>Escoge el tema de la evaluación</option>
								@foreach( $topics as $topic )
									<option value="{{ $topic->id }}">{{ $topic->topic }}</option>
								@endforeach
							</select>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn-md btn btn-elegant" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn-md btn btn-danger"><i class="fas fa-save mr-2"></i>Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>