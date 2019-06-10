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
				<div class="card-body">

					vista del admin, aqui ira todo el contenido tanto los archivos como las imagenes y los videos, divididos en secciones tal como se muestr en la primera seccion q es la q mostrara los archivos.

					@if( count($contents) > 0 )
						<div class="card-columns">
							@foreach($contents as $content)
								<!-- Card Wider -->
								<div class="card wider mb-4 img">
									<!-- Card image -->
									<div class="view text-center mt-3" data-toggle="modal" data-target="#imgmodal">

										@if( preg_match("/(\.pdf)$/", $content->file) )
											<a href='{{ asset("storage/$content->file") }}'><i class="fas fa-file-pdf fa-5x"></i></a>
										@endif

										@if( preg_match("/(\.docx|\.doc|\.odt)$/", $content->file) )
											<a href='{{ asset("storage/$content->file") }}'><i class="fas fa-file-word fa-5x"></i></a>
										@endif
										
										@if( preg_match("/(.txt)$/", $content->file) )
											<a href='{{ asset("storage/$content->file") }}'><i class="fas fa-file-alt fa-5x"></i></a>
										@endif

										@if( preg_match("/(\.csv)$/", $content->file) )
											<a href='{{ asset("storage/$content->file") }}'><i class="fas fa-file-csv fa-5x"></i></a>
										@endif

										@if( preg_match("/(.ppt)$/", $content->file) )
											<a href='{{ asset("storage/$content->file") }}'><i class="fas fa-file-powerpoint fa-5x"></i></a>
										@endif
										
										@if( preg_match("/(\.excel|\.xls)$/", $content->file) )
											<a href='{{ asset("storage/$content->file") }}'><i class="fas fa-file-excel fa-5x"></i></a>
										@endif

									</div>
									<!-- Card content -->
									<div class="card-body card-body-cascade text-justify">
										<!-- Title -->
										<p class="card-title text-center">{{ $content->name }}</p>
										<!-- Subtitle -->
										<p class="blue-text pb-2 text-center">{{ $content->topic->topic }}</p>
										<!-- Text -->
										<p class="card-text">{{ $content->comment }}</p>
									</div>
									<div class="card-footer">
								    	<small class="text-muted">{{ $carbon->diffForHumans($content->created_at) }}</small>
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


@include('layouts.footer')