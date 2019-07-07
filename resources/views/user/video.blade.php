@include('layouts.header')
@include('layouts.navbar')

<br>
<div class="container my-5 pt-5 animated fadeIn bg">
	<div class="row">
		<div class="col-lg-3 col-sm-12 animated slideInLeft">
			<div class="row">
				<div class="col-sm-6 col-lg-12">
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
				<div class="col-sm-6 col-lg-12  mt-sm-3">
					<div class="card mb-5">
						<div class="card-header cyan lighten-3 text-dark ">
							<h5 class="d-flex justify-content-between">
								<span><i class="fas fa-book mr-2"></i>Temas</span>
								<span>{{ $topics->count() }}</span>
							</h5>
						</div>
						<div class="card-body">
							<ul class="list-group">
								@foreach( $topics as $topic )
									<li class="list-group-item">
										<a href='#'>{{ $topic->topic }}</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
			
		<div class="col-lg-9 col-sm-12">
			@include('layouts.info')
			<div class="row">
				<div class="col-12">
					@if(count($videos) > 0)
						@foreach($videos as $v)	
							<div class="card animated slow wow zoomIn mb-4">
								<div class="card-body">
									<div class="embed-responsive embed-responsive-16by9">
										<video controls src="{{ asset('storage/$v->file') }}"></video>
									</div>
								</div>
								<div class="card-footer">
									<p class="h4">{{ $v->name }}</p>
									<p class="text-monospace">{{ $v->comment }}</p>
								</div>
							</div>
						@endforeach
					@else
						<div class="card animated slow wow zoomIn mb-4">
							<div class="card-body">
								<p class="text-center h5">No hay videos para mostrar!</p>
							</div>
						</div>
					@endif
				</div>
				
			</div>
			
		</div>
	</div>
</div>

@include('layouts.footer')