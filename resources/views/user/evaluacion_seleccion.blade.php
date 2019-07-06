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
		<div class="col-md-7 col-sm-12 animated slideInRight">
			<div class="col-md-12 col-sm-12 text-center">
				<div class="countdown-timer-wrapper">
			      <div class="timer" id="countdown"></div>
			    </div>
			</div>
			@include('layouts.info')
			<div class="card" >
				<div class="card-header">
					{{ $test->topic->topic }}
				</div>
				@if(MyHelper::timefinish($end_time))
				<div class="card-body">
					<p class="h4 text-center">La Evaluación a culminado!</p>
				</div>
				@else
					<?php $count = $test->questionsimples()->count() ?>
					<?php $respondida = false;?>
					@if($count >= 1)
					<div class="card-body">
						<table class="table">
							<thead>
								<tr>
									<th>Pregunta</th>
									<th>Valor</th>
									<th></th>
									<th>Nota</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
								@foreach($test->questionsimples as $question)
								<?php $true = MyHelper::tieneNotaSelectII($me->people->student->id,$question->id) ?>
								<tr align="center">
									<td>{{ $question->text }}</td>
									<td>{{ $question->value }}</td>
									<td align="center">
										<span class="fas {{ ($true)?'fa-check':'' }}"></span>
									</td>
									<td>{{ MyHelper::notaSimpleTotalRespuesta($me->people->student->id,$question->id) }}</td>
									<td>
										<a href="{{ route('estudiante.pregunta.simple',[$test->id,$question->id]) }}" title="{{ (!$true)?'Responder':'Ver' }}">{{ (!$true)?'Responder':'Ver' }}</a>
									</td>
								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr class="bg bg-info text-white">
									<td class="text-center">EVALUACION</td>
									<td class="text-center">{{ $total_evl }}pts</td>
									<td class="text-center">OBTENIDO</td>
									<td class="text-center">{{ $total_pts }}pts</td>
									<td class="text-center" style="font-family: serif; font-size: 18px;color: {{ ($aprobado=='Aprobado')?'green;':'red;' }}"><b>{{ $aprobado }}</b></td>
								</tr>
							</tfoot>
						</table>
					</div>
					@endif
				@endif
			</div>
		</div>
		<div class="col-md-2 text-right">
			<a href="{{ route('evaluaciones') }}" class="btn btn-sm btn-warning" title="">Volver</a>
		</div>
	</div>
</div>
@section('my_code_js')
	<script>
		$(document).ready(function(){
			var myDate = new Date('{{ $end_time }}');
			console.log(myDate);
			$("#countdown").countdown(myDate, function (event) {
				$(this).html(
					event.strftime(
                        '<div class="timer-wrapper"><div class="time">%D</div><span class="text">Dias</span></div><div class="timer-wrapper"><div class="time">%H</div><span class="text">Horas</span></div><div class="timer-wrapper"><div class="time">%M</div><span class="text">Minutos</span></div><div class="timer-wrapper"><div class="time">%S</div><span class="text">Segundos</span></div>'
                    )
				)
				// .on('finish.countdown', function(){
				// 	alert('Hola mundo :v');
				// });
            });
		});
	</script>
@stop
@include('layouts.footer')