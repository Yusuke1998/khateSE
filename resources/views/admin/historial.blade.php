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
			@include('layouts.info')
			<div class="card" >
				<div class="card-header">
					<p>Estudiante: {{ $estudiante->people->first_name }} {{ $estudiante->people->last_name }}</p>
					<p>Seccion: {{ $estudiante->people->student->section->section }}</p>
				</div>
				<?php $estudiante = $estudiante->people;?>
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th>Evaluacion</th>
								<th>Fecha</th>
								<th>Pregunta</th>
								<th>Respuesta</th>
								<th>Nota</th>
								<th>Accion</th>
							</tr>
						</thead>
						<tbody>
						@if($estudiante->answers->count() > 0)
							@foreach($estudiante->answers as $answer)
								<tr>
									<td>{{ $answer->test->topic->topic }}</td>
									<td>{{ $answer->test->created_at->format('d/m/Y') }}</td>
									<td>{{ $answer->question->text }}</td>
									<td>{{ $answer->text }}</td>
									<td>
										<?php $nota = MyHelper::notaTotalRespuesta($answer->id,$answer->people_id) ?>
										<span class="p-1 bg-{{ ($nota!='00')?'success':'warning' }}">{{ $nota }}</span>
									</td>
									<td>
										<div class="btn-group">
											<?php $people 	= $answer->people_id;?>
											<?php $test 	= $answer->test_id;?>
											<?php $question = $answer->question->id;?>
											<?php $answer 	= $answer->id;?>
											<a 
												href="{{ ($nota!='00')?'#':route('nota.nueva',[$people,$test,$question,$answer]) }}"
												onclick="{{ ($nota!='00')?'alert(\'Ya se le asigno la nota!\')':'' }}" 
												class="btn btn-sm btn-info" 
												title="">VER
											</a>
										</div>
									</td>
								</tr>
							@endforeach
						@endif

						@if($estudiante->student->noteselects->count() > 0)
							{{-- @foreach($estudiante->student->noteselects as $nota) --}}
							<tr>
								<td>hola</td>
								<td>hola</td>
								<td>hola</td>
								<td>hola</td>
								<td>hola</td>
								<td>hola</td>
							</tr>
							{{-- @endforeach --}}
						@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@include('layouts.footer')