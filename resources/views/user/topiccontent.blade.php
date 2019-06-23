@include('layouts.header')
@include('layouts.navbar')

<br>
<div class="container my-5 pt-5 animated fadeIn bg">

	<div class="row">
		{{-- Sidebar --}}
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
		{{-- Sidebar --}}
			
		<div class="col-md-9 col-sm-12 animated zoomInRight slow">
			@include('layouts.info')
			@if($contentsm != '' || $contents != '')
			<div class="card" >
				@if(count($contents) > 0)
				<div class="card-body px-5">
					<p class="text-center">Contenido textual</p>
						<h2 class="animated rollIn delay-1s font-weight-light mb-5">{{ $contents[0]->topic->topic }}</h2>
						<ul class="list-group">
							@foreach( $contents as $c )
								<div class="list-group">
									<a href="#!" class="mb-5 py-4 list-group-item list-group-item-action flex-column align-items-start">
										<div class="d-flex w-100 justify-content-between">
											<h5 class="mb-2 h5">{{ $c->name }}</h5>
											<small>{{ $c->created_at->diffForHumans() }}</small>
										</div>
										<p class="mb-2 content text-truncate">
											{!! $c->textcontent !!}
										</p>
										{{-- <div class="d-flex justify-content-end mt-3">
											<button data-toggle="modal" data-target="#basicExampleModal" class="btnmodalcontent btn btn-sm cyan lighten-2"><i class="fas fa-search mr-2"></i> Entrar</button>
										</div> --}}
									</a>
								</div>
							@endforeach
						</ul>
				</div>
				@endif

				@if(count($contentsm) > 0)
				<div class="card-body mt-5 px-5">
					<p class="text-center">Contenido multimedia</p>
						<h2 class="animated rollIn delay-1s font-weight-light mb-5">{{ $contentsm->first()->topic->topic }}</h2>

						<ul class="list-group">
							@foreach( $contentsm as $c )
								<div class="list-group">
									<a href="#!" class="mb-5 py-4 list-group-item list-group-item-action flex-column align-items-start">
										<div class="d-flex w-100 justify-content-between">
											<h5 class="mb-2 h5" id="topic-mult-title">{{ $c->name }}</h5>
											<small>{{ $c->created_at->diffForHumans() }}</small>
										</div>
										<div class="card mb-3 view zoom hoverable">
											<div class="card-body d-flex justify-content-center">
												<img class="img-fluid" src='{{ asset("storage/$c->file") }}' alt="">
											</div>
										</div>
										<p id="topic-mult-text" class="mb-2 text-truncate content">
											{{ $c->comment }}
										</p>
										{{-- <div class="d-flex justify-content-end mt-3">
											<button data-toggle="modal" data-target="#basicExampleModal2" class="btnmodalcontent2 btn btn-sm cyan lighten-2"><i class="fas fa-search mr-2"></i> Entrar</button>
										</div> --}}
									</a>
								</div>
							@endforeach
						</ul>
				</div>
				@endif
			</div>
			@else
			<p>No hay nada para mostrar!</p>
			@endif

		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="modaltitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-title-1">Loading...</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p id="modal-content-1">Loading...</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm cyan lighten-2" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal2 -->
<div class="modal fade" id="basicExampleModal2" tabindex="-1" role="dialog" aria-labelledby="modaltitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-title-2">Loading...</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
				<p id="modal-content-2">Loading...</p>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm cyan lighten-2" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>


@include('layouts.footer')