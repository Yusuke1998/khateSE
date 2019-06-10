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
			
			<!-- Classic tabs -->
			<div class="classic-tabs mx-2">

				<ul class="nav cyan lighten-3" id="myClassicTabOrange" role="tablist">
					<li class="nav-item">
						<a class="nav-link black-text  waves-light active show" id="profile-tab-classic-orange" data-toggle="tab" href="#profile-classic-orange" role="tab" aria-controls="profile-classic-orange" aria-selected="true">
							<i class="fas fa-edit fa-2x pb-2" aria-hidden="true"></i><br>Contenido
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link black-text waves-light" id="follow-tab-classic-orange" data-toggle="tab" href="#follow-classic-orange" role="tab" aria-controls="follow-classic-orange" aria-selected="false">
							<i class="fas fa-image fa-2x pb-2" aria-hidden="true"></i><br>Imágenes
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link black-text waves-light" id="contact-tab-classic-orange" data-toggle="tab" href="#contact-classic-orange"
						role="tab" aria-controls="contact-classic-orange" aria-selected="false">
							<i class="fas fa-video fa-2x pb-2" aria-hidden="true"></i><br>Vídeos
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link black-text waves-light" id="awesome-tab-classic-orange" data-toggle="tab" href="#awesome-classic-orange" role="tab" aria-controls="awesome-classic-orange" aria-selected="false">
							<i class="fas fa-file fa-2x pb-2" aria-hidden="true"></i><br>Archivos
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link black-text waves-light" id="test-tab-classic-orange" data-toggle="tab" href="#test-classic-orange" role="tab" aria-controls="test-classic-orange" aria-selected="false">
							<i class="fas fa-star fa-2x pb-2" aria-hidden="true"></i><br>Pruebas
						</a>
					</li>
				</ul>

				<div class="tab-content card" id="myClassicTabContentOrange">
					<div class="tab-pane fade active show" id="profile-classic-orange" role="tabpanel" aria-labelledby="profile-tab-classic-orange">
						
						@foreach($textcontents as $t)
							<div class="card mb-3">
								<div class="card-body">
									<h4 class="card-title">{{ $t->name }}</h4>
									<p class="card-text">{{ $t->textcontent }}</p>
								</div>
							</div>
						@endforeach

					</div>
					<div class="tab-pane fade" id="follow-classic-orange" role="tabpanel" aria-labelledby="follow-tab-classic-orange">
						
						@foreach($images as $img)
							<div class="card mb-3">
								<div class="card-body d-flex justify-content-center">
									<img class="img-fluid" src='{{ asset("storage/$img->file") }}' alt="">
								</div>
							</div>
						@endforeach

					</div>
					<div class="tab-pane fade" id="contact-classic-orange" role="tabpanel" aria-labelledby="contact-tab-classic-orange">
						<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
							deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non
							provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.
							Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est
							eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas
						assumenda est, omnis dolor repellendus. </p>
					</div>
					<div class="tab-pane fade" id="awesome-classic-orange" role="tabpanel" aria-labelledby="awesome-tab-classic-orange">
						
						<div class="row">
							@foreach($files as $content)
								<div class="col-4">
									<div class="card wider mb-4 img">
										<!-- Card image -->
										<div class="view text-center mt-3" data-toggle="modal" data-target="#imgmodal">

											@if( preg_match("/(\.pdf)$/", $content->file) )
												<a title="{{ $content->file }}" href='{{ asset("storage/$content->file") }}'><i class="fas fa-file-pdf fa-5x"></i></a>
											@endif

											@if( preg_match("/(\.docx|\.doc|\.odt)$/", $content->file) )
												<a title="{{ $content->file }}" href='{{ asset("storage/$content->file") }}'><i class="fas fa-file-word fa-5x"></i></a>
											@endif
											
											@if( preg_match("/(.txt)$/", $content->file) )
												<a title="{{ $content->file }}" href='{{ asset("storage/$content->file") }}'><i class="fas fa-file-alt fa-5x"></i></a>
											@endif

											@if( preg_match("/(\.csv)$/", $content->file) )
												<a title="{{ $content->file }}" href='{{ asset("storage/$content->file") }}'><i class="fas fa-file-csv fa-5x"></i></a>
											@endif

											@if( preg_match("/(.ppt)$/", $content->file) )
												<a title="{{ $content->file }}" href='{{ asset("storage/$content->file") }}'><i class="fas fa-file-powerpoint fa-5x"></i></a>
											@endif
											
											@if( preg_match("/(\.excel|\.xls)$/", $content->file) )
												<a title="{{ $content->file }}" href='{{ asset("storage/$content->file") }}'><i class="fas fa-file-excel fa-5x"></i></a>
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
								</div>
							@endforeach
						</div>

					</div>
					<div class="tab-pane fade" id="test-classic-orange" role="tabpanel" aria-labelledby="awesome-tab-classic-orange">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
							ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
							eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
						deserunt mollit anim id est laborum.</p>
					</div>
				</div>

			</div>
			<!-- Classic tabs -->








			
			
		</div>
	</div>
</div>


@include('layouts.footer')