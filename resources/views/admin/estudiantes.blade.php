@include('layouts.header')
@include('layouts.navbar')

<br>
<div class="container my-5 pt-5 animated fadeIn bg">

	<div class="row">

		<div class="col-md-3 col-sm-12 animated slideInLeft">
			<div class="row">
				<div class="col-sm-6 col-md-12">
					<div class="card testimonial-card">
						<div class="card-up cyan lighten-3 dark-text"></div>
						<div class="avatar mx-auto white">
							<img src="{{ asset('storage/'.$me->people->avatar) }}" class="rounded-circle" alt="404">
						</div>
						<div class="card-body">
							<h4 class="card-title mt-3">{{ $me->people->first_name }} {{ $me->people->last_name }}</h4>
							@if($me->type == 'admin')
							<p class="lead">Administrador</p>
							@elseif($me->type == 'teacher')
							<p class="lead">Profesor</p>
							@elseif($me->type == 'student')
							<p class="lead">Estudiante</p>
							<p class="small">Sección {{ $me->people->student->section->section }}</p>
							@endif
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-12 mt-3">
					<div class="card mb-5">
						<div class="card-header cyan lighten-3 text-dark ">
							<h5 class="d-flex justify-content-between">
								<span><i class="fas fa-book mr-2"></i>Unidades</span>
								<span>{{ $topics->count() }}</span>
							</h5>
						</div>
						<div class="card-body">
							<ul class="list-group">
								@foreach( $topics as $topic )
									<li class="list-group-item">
										<a href='{{ url("tema/$topic->topic") }}'>{{ $topic->topic }}</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
			
		<div class="col-md-9 col-sm-12 animated slideInRight">
			<div class="card" >
				<div class="card-body">
					<h6 class="mb-4 text-right"><i class="fas fa-group mr-2"></i>Hay {{ $cantidad = count($contents) }} {{ ($cantidad>1)?'estudiantes registrados':'estudiante registrado' }}</h6>
					<table class="table table-bordeder table-sm" id="dtstudents">
						<thead>
							<th>ID</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Sección</th>
							<th>Email</th>
							<th>Registrado</th>
							<th>Historial</th>
						</thead>
						<tbody>
							@foreach($contents as $est)
							<tr>
								<th>{{ $est->id }}</th>
								<td>{{ $est->people->first_name }}</td>
								<td>{{ $est->people->last_name }}</td>
								<td>{{ $est->people->student->section->section }}</td>
								<td>{{ $est->email }}</td>
								<td>{{ $est->created_at->format('d/m/Y') }}</td>
								<td>
									<a href="{{ route('historial',$est->id) }}" title="Historico de {{ $est->people->first_name }}">VER</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<!-- <div class="modal fade" id="imgmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="targettitulo">Loaging...</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body py-5">

				<div class="card card-cascade wider reverse">
					<div class="view view-cascade zoom">
						<img class="card-img-top" id="targetimg" alt="error loading image">
						<a href="#!">
							<div class="mask rgba-white-slight"></div>
						</a>
					</div>
					<div class="card-body card-body-cascade text-center">
						<h6 class="font-weight-bold indigo-text py-2" id="targettopic">Loading...</h6>
						<p class="card-text" id="targetcontenido">Loading...</p>
					</div>
				</div>

			</div>
		</div>
	</div>
</div> -->

@include('layouts.footer')