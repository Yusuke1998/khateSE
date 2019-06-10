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

					@if( count($topics) > 0 )

						<h2 class="text-center mb-5 font-weight-light animated rollIn delay-1s">Seleciona un tema para empezar</h2>

						
						<div class="row">
							
							@foreach($topics as $t)	
								<!-- Card -->
								<div class="card col-md-4 col-sm-3 mb-4">
									<!-- Card image -->
									<div class="view zoom d-flex align-items-center" style="height: 160px">
										<img class="card-img-top" src='{{ asset("storage/$t->image") }}' alt="Card image cap">
										<a href="#!">
											<div class="mask rgba-white-slight"></div>
										</a>
									</div>
									<!-- Card content -->
									<div class="card-body">
										<!-- Title -->
										<h4 class="card-title text-center">{{ $t->topic }}</h4>
										<!-- Text -->
										<p class="card-text text-justify">{{ $t->description }}</p>
										<!-- Button -->
										<div class="d-flex justify-content-center">
											<a href='{{ url("tema/$t->topic") }}' class="btn btn-sm cyan lighten-2">Entrar</a>
										</div>
									</div>
								</div>
								<!-- Card -->
							@endforeach

						</div>


					@else
						<h3 class="text-center mb-5">Aún no hay un contenido registrado.</h3>
						<p class="text-center">
							<i class="fas fa-user fa-10x"></i>
						</p>
					@endif

				</div>
			</div>
			
		</div>
	</div>
</div>


@include('layouts.footer')