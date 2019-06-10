@include('layouts.header')
@include('layouts.navbar')

<br>
<div class="container my-5 pt-5 animated fadeIn">

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
							<h4 class="card-title">{{ $me->people->first_name }} {{ $me->people->last_name }}</h4>
							<p class="lead">{{ $me->type }}</p>
							<p class="lead">{{ ucfirst($me->people->type) }}</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-12 mt-3">
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
										<a href='{{ url("tema/$topic->topic") }}'>{{ $topic->topic }}</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
			
		<div class="col-md-9 col-sm-12 animated zoomInRight slow">
			<div class="card" >
				<div class="card-body px-5">

					@if( count($contents) > 0 )
						<h2 class="animated rollIn delay-1s font-weight-light mb-5">{{ $contents[0]->topic->topic }}</h2>

						<ul class="list-group">
							@foreach( $contents as $c )
								<div class="list-group">
									<a href="#!" class="py-4 list-group-item list-group-item-action flex-column align-items-start">
										<div class="d-flex w-100 justify-content-between">
											<h5 class="mb-2 h5">{{ $c->name }}</h5>
											<small>{{ $carbon->diffForHumans($c->created_at) }}</small>
										</div>
										<p class="mb-2 text-truncate content">{{ $c->textcontent }}</p>
										<div class="d-flex justify-content-end mt-3">
											<button data-toggle="modal" data-target="#basicExampleModal" class="btnmodalcontent btn btn-sm cyan lighten-2"><i class="fas fa-search mr-2"></i> Entrar</button>
										</div>
									</a>
								</div>
							@endforeach
						</ul>
					@else
						<h2 class="text-center font-weight-light">No hay información registrada aún.</h2>
					@endif

				</div>
			</div>
			
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="modaltitle" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="modaltitle">Loading...</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			
			<p id="contenido">Loading...</p>

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-sm cyan lighten-2" data-dismiss="modal">Cerrar</button>
		</div>
	</div>
</div>
</div>


@include('layouts.footer')