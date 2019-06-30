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
			<div class="col-md-12 col-sm-12 text-right">
				<a href="{{ route('evaluacion.simple',$test->id) }}" class="btn btn-sm btn-warning" title="">Volver</a>
			</div>
			@include('layouts.info')
			<div class="card" >
				<div class="card-header">
					<p>Evaluacion: {{ $test->topic->topic }}</p>
					<p>Pregunta: {{ $question->text }}</p>
				</div>
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Respuestas</th>
								<th>Asignar</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$todo = true;
								$respondida = false;

								if (MyHelper::tieneNotaSelect($question->id,$me->people->student->id)) {
									$todo = false;
								}
							?>

							@foreach($question->answersimples as $answer)
								<?php $respondida = false; ?>
								@if($misnotas = $me->people->student->noteselects)
									@foreach($misnotas as $nota)
										@if($answer->id == $nota->answer_simple_id)
											<?php $respondida = true; ?>
										@endif
									@endforeach
								@endif
							<tr>
								<td>{{ $answer->number }}</td>
								<td>{{ $answer->text }}</td>
								<td class="text-left">
									<span class="fas {{ ($respondida)?'fa-check':'' }}"></span>
								</td>
								<td align="center">
									@if($todo)
									<a href="{{ ($respondida)?'#':route('estudiante.asignar',[$test->id,$question->id,$answer->id,$answer->number]) }}" class="btn btn-sm btn-success" title="Presiona aqui, para asignar esta respuesta como la correcta!" onclick="{{ (!$respondida)?'':'alert(\'Ya respondiste!\')'}}">Asignar</a>
									@endif
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


@include('layouts.footer')