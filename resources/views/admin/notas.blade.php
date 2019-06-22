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
				<div class="card-header">
					<p class="pull-left">Estudiante: {{ $people->first_name }} {{ $people->last_name }}</p>
					<p class="pull-right">Evaluacion: {{ $test->topic }}</p>
				</div>
				<div class="card-body">
					<p class="h5">Pregunta: {{ $question->text }}</p>
					<ul style="list-style: none;">
						<li>Ponderacion: {{ $question->value }}</li>
					</ul>
					<hr>
					<p class="h5">Respuesta: {{ $answer->text }}</p>
				</div>
					<button class="btn cyan lighten-2 btn-md" data-toggle="modal" data-target="#nota">
						Agregar Nota
					<button>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="nota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nota</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ route('nota.asignar') }}" method="post">
				@csrf
				<input type="hidden" name="people_id" value="{{ $people->id }}">
				<input type="hidden" name="test_id" value="{{ $test->id }}">
				<input type="hidden" name="question_id" value="{{ $question->id }}">
				<input type="hidden" name="answer_id" value="{{ $answer->id }}">
				<div class="modal-body px-4">
					<div class="form-row">
						<div class="col md-form">
							<i class="fas fa-plus prefix"></i>
							<input type="number" name="note" id="note" class="validate form-control" required value="{{ old('note') }}">
							<label for="note">Nota</label>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-md" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn cyan lighten-3 btn-md"><i class="fas fa-edit mr-2"></i>Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>

@include('layouts.footer')