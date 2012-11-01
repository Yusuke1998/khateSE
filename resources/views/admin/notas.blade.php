@include('layouts.header')
@include('layouts.navbar')

<div class="container my-5 pt-5 animated fadeIn">

	@if( session('success') )
		<div class="row">
			<div class="col">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<i class="fas fa-check mr-2"></i>{{ session('success') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	@endif

	<div class="row">
		<div class="col-md-3">
			<div class="row">
				<div class="col">
					<div class="card">
						<h4 class="card-header red lighten-1 white-text">
							<i class="fas fa-users mr-2"></i> Estudiantes
						</h4>
						<div class="card-body">
							<ul class="list-group">
								@foreach( $estudiantes as $e )
									<li class="list-group-item d-flex justify-content-between align-items-center px-3">
										<span class="f-2">{{ $e->people->first_name.' '.$e->people->last_name }}</span>


										<!-- Split button -->
										<div class="btn-group">
											<button type="button" class="btn btn-flat p-1" data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">
												<i class="fas fa-ellipsis-v"></i>
											</button>
											<div class="dropdown-menu">
												@if( $e->isactivated == 1 )
													<a class="dropdown-item blockuser" data-toggle="modal" data-peopleid="{{ $e->people->id }}" href="#bloquear">Bloquear usuario</a>
												@else
													<a class="dropdown-item" onclick="event.preventDefault();document.getElementById('formpeopleid').submit();">Activar usuario</a>
													<form action="{{ url('bloquear') }}" method="post" id="formpeopleid" style="display: none;">
														@csrf
														<input type="hidden" name="peopleid" value="{{ $e->people->id }}">
													</form>
												@endif

												@if( $e->people->isgraduated == 1 )
													<a class="dropdown-item actcert" data-peopleid="{{ $e->people->id }}" id="toggle">Deshabilitar certificado</a>
												@else
													<a class="dropdown-item actcert" data-peopleid="{{ $e->people->id }}" id="toggle">Habilitar certificado</a>
												@endif
											</div>
										</div>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col">
					<div class="card">
						<h4 class="card-header red lighten-1 white-text">
							<i class="fas fa-book mr-2"></i> Temas
						</h4>
						<div class="card-body">
							<ul class="list-group">
								@foreach( $topics as $t )
									{{-- <li class="list-group-item"><a href='{{ url("notas/$t->topic") }}'>{{ $t->topic }}</a></li> --}}
									<li class="list-group-item">{{ $t->topic }}</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-9">
			<div class="card">
				<h4 class="card-header red lighten-1 white-text d-flex justify-content-between align-items-center">
					<span><i class="fas fa-clipboard-list mr-2"></i> Notas</span>
					<div>
						<a class="btn btn-md btn-elegant" href="{{ url('notaspdf') }}">
							<i class="fas fa-file-pdf mr-2"></i>Descargar PDF
						</a>
						<button class="btn btn-md btn-elegant" data-toggle="modal" data-target="#notanueva">
							<i class="fas fa-clipboard-list mr-2"></i>Añadir nota
						</button>
					</div>
				</h4>
				<div class="card-body">

					<table id="dtBasicExample" class="table table-hover table-sm table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="th-sm">CEDULA</th>
								<th class="th-sm">NOMBRE</th>
								<th class="th-sm">APELLIDO</th>
								<th class="th-sm">TEMA</th>
								<th class="th-sm">NOTA</th>
							</tr>
						</thead>
						<tbody>
							@foreach( $notas as $n )
								<tr>
									<td>{{ $n->user->people->pin }}</td>
									<td>{{ $n->user->people->first_name }}</td>
									<td>{{ $n->user->people->last_name }}</td>
									<td>{{ $n->test->topic->topic }}</td>
									<td>{{ $n->note }}</td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>CEDULA</th>
								<th>NOMBRE</th>
								<th>APELLIDO</th>
								<th>TEMA</th>
								<th>NOTA</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>


<!-- Modal para añadir nota -->
<div class="modal fade" id="notanueva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Añadir Nota</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="notesform"> {{-- action="{{ url('addnota') }}" method="post" --}}
				<div class="modal-body">

					<div class="form-row">
						<div class="col">
							<select class="mdb-select md-form colorful-select dropdown-dark" name="testid" id="testid" required>
								<option disabled selected>Escoge una prueba</option>
								@foreach( $tests as $t )
									<option value="{{ $t->id }}">{{ $t->topic->topic }} - {{ $t->link }}</option>
								@endforeach
							</select>
							<label>Selecciona un enlace de examen </label>
						</div>
						<div class="col">
							<select class="mdb-select md-form colorful-select dropdown-dark" name="userid" id="userid" required>
								<option disabled selected>Escoge una persona</option>
								@foreach( $personas as $p )
									<option value="{{ $p->id }}">{{ $p->people->first_name.' '.$p->people->last_name }}</option>
								@endforeach
							</select>
							<label>Selecciona a un estudiante</label>
						</div>
						<div class="col-2 md-form">
							<i class="fas fa-clipboard-list prefix mr-2"></i>
							<input type="number" name="note" id="nota" class="form-control validate" min="0" max="100" required>
							<label for="nota">Nota</label>
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


<!-- Modal bloquer estudiante -->
<div class="modal fade" id="bloquear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Desactivar cuenta</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('bloquear') }}" method="post">
				@csrf
				<input type="hidden" name="peopleid" id="desacpeopleid">
				<div class="modal-body">

					<p class="lead text-center">¿Estás seguro de desactivarle la cuenta a éste estudiante?</p>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn-md btn btn-elegant" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn-md btn btn-danger"><i class="fas fa-save mr-2"></i>Desactivar</button>
				</div>
			</form>
		</div>
	</div>
</div>

@include('layouts.footer')