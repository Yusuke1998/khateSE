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
			
		<div class="col-md-9 col-sm-12 animated slideInRight">
			<!-- <div class="card-columns cardcolumns "> -->
			<div class="card" >
				<div class="card-body">

					@if( count($contents) > 0 )
						<div class="card-columns">
							@foreach($contents as $content)
								<!-- Card Wider -->
								<div class="card wider mb-4 img">
									<!-- Card image -->
									<div class="view view-cascade zoom" data-toggle="modal" data-target="#imgmodal">
										<img  class="card-img-top border-bottom" src='{{ asset("storage/$content->file") }}' alt="Card image cap">
										<a href="#!">
											<div class="mask rgba-white-slight"></div>
										</a>
									</div>
									<!-- Card content -->
									<div class="card-body card-body-cascade text-justify">
										<!-- Title -->
										<h4 class="card-title text-center">{{ $content->name }}</h4>
										<!-- Subtitle -->
										<h5 class="blue-text pb-2 text-center">{{ $content->topic->topic }}</h5>
										<!-- Text -->
										<p class="card-text text-truncate">{{ $content->comment }}</p>
									</div>

								</div>
								<!-- Card Wider -->
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


<!-- MODALES -->
<!-- Modal -->
<div class="modal fade" id="imgmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="targettitulo">Loaging...</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body py-5">

	

				<!-- Card -->
				<div class="card card-cascade wider reverse">
					<!-- Card image -->
					<div class="view view-cascade zoom">
						<img class="card-img-top" id="targetimg" alt="error loading image">
						<a href="#!">
							<div class="mask rgba-white-slight"></div>
						</a>
					</div>
					<!-- Card content -->
					<div class="card-body card-body-cascade text-center">
						<!-- Subtitle -->
						<h6 class="font-weight-bold indigo-text py-2" id="targettopic">Loading...</h6>
						<!-- Text -->
						<p class="card-text" id="targetcontenido">Loading...</p>
					</div>
				</div>
				<!-- Card -->



			</div>

		</div>
	</div>
</div>

@include('layouts.footer')