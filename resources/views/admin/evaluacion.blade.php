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
			@include('layouts.info')
			<div class="card" >
				<div class="card-header">
					<p style="text-transform: uppercase; font-family: sans-serif;">Evaluacion: "{{ $test->topic }}"</p>
					<ul style="text-transform: uppercase; font-family: sans-serif; list-style: upper-roman; color: #004">
						<li>Ponderacion total de la evaluacion: {{ $a = $test->note }}pts</li>
						<li>Valor total de preguntas: {{ $b = $test->questions->sum('value') }}pts</li>
					</ul>
				</div>
				<?php $count = $test->questions()->count() ?>

				@if($b < $a && $count >= 1)
				<div class="card-body">
					<p class="text-center">Agrega más preguntas!</p>
					<a href="{{ route('pregunta',$test->id) }}" class="pull-right btn btn-info btn-sm btn-flat" title="nueva pregunta">Nueva pregunta</a>
				</div>
				@endif

				@if($count >= 1)
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th>Pregunta</th>
								<th>Valor</th>
							</tr>
						</thead>
						<tbody>
							@foreach($test->questions as $question)
							<tr>
								<td>{{ $question->text }}</td>
								<td>{{ $question->value }}</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td>VALOR TOTAL</td>
								<td>{{ $test->questions->sum('value') }}</td>
							</tr>
						</tfoot>
					</table>
				</div>
				@else
				<div class="card-body">
					<p class="text-center">Agrega preguntas a esta evaluacion!</p>
					<a href="{{ route('pregunta',$test->id) }}" class="pull-right btn btn-info btn-sm btn-flat" title="nueva pregunta">Nueva pregunta</a>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>


@include('layouts.footer')