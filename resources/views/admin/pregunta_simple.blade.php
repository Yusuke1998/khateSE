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
					{{ $test->topic->topic }}
				</div>
				<div class="card-body">
					<form action="{{ route('preguntasimple.guardar') }}" method="post">
						@csrf
						<input type="hidden" name="test_id" value="{{ $test->id }}">
						<div class="form-row">
							<div class="col md-form">
								<input type="text" name="text" id="text" class="form-control {{ $errors->has('text') ? ' is-invalid' : '' }} validate" value="{{ old('text') }}" required>
								<label for="text">Contenido de la pregunta</label>
								@if ($errors->has('text'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('text') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-row">
							<div class="col md-form">
								<input type="number" name="value" id="value" class="form-control {{ $errors->has('value') ? ' is-invalid' : '' }} validate" value="{{ old('value') }}" required>
								<label for="value">Valor de la pregunta</label>
								@if ($errors->has('value'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('value') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-row">
							<div class="col md-form">
								<input type="number" name="good" id="good" class="form-control {{ $errors->has('text') ? ' is-invalid' : '' }} validate" value="{{ old('text') }}" required>
								<label for="good">Ingresa el numero de la respuesta que sera valida</label>
								@if ($errors->has('good'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('good') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="d-flex justify-content-center animated zoomIn delay-1s">
							<button class="btn btn-md cyan lighten-2" type="submit">Guardar</button>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>
</div>


@include('layouts.footer')