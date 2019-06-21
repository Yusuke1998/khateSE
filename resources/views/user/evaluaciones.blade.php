@include('layouts.header')
@include('layouts.navbar')

<br>
<div class="container my-5 pt-5 animated fadeIn bg">

	<div class="row">

		<div class="col-md-3 col-sm-12 animated slideInLeft slow">
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
			<!-- <div class="card-columns cardcolumns "> -->
			<div class="card" >
				<div class="card-body">
					@if($tests->count() > 0)
						<table class="table">
							<thead>
								<tr>
									<th>Tema</th>
									<th>Ponderacion</th>
									<th>Seccion</th>
									<th>Accion</th>
								</tr>
							</thead>
							<tbody>
								@foreach($tests as $test)
								<tr>
									<td>{{ $test->topic }}</td>
									<td>{{ $test->note }}</td>
									<td>{{ $test->section->section }}</td>
									<td>
										<div class="btn-group">
										<a class="btn btn-sm btn-flat btn-info" href="{{ route('estudiante.evaluacion',$test->id) }}" title="">Ver</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						@else
						<p>No hay pruebas creadas</p>
					@endif
				</div>
			</div>
			
		</div>
	</div>
</div>


@include('layouts.footer')