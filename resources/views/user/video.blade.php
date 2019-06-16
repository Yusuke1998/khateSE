@include('layouts.header')
@include('layouts.navbar')

<br>
<div class="container my-5 pt-5 animated fadeIn bg">

	<!-- <div class="row">
		<div class="col my-5">
			<h1>Todas las entradas</h1>
		</div>
	</div> -->

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
							<h4 class="card-title">{{ $me->people->first_name }} {{ $me->people->last_name }}</h4>
							<p class="lead">{{ $me->type }}</p>
							<p class="lead">{{ ucfirst($me->people->type) }}</p>
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
										<a href='#'>{{ $topic->topic }}</a>{{-- {{ url("home/$topic->topic") }} --}}
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
			
		<div class="col-lg-9 col-sm-12">
				
			<div class="row">
				
				<div class="col-12">
					
					@foreach($videos as $v)	
						<div class="card animated slow wow zoomIn mb-4">
							<div class="card-body">
								<div class="embed-responsive embed-responsive-16by9">
									<video controls src="{{ asset('storage/v2.mp4') }}"></video>
								</div>
							</div>
							<div class="card-footer">
								<p class="h4">{{ $v->name }}</p>
								<p class="text-monospace">{{ $v->comment }}</p>
							</div>
						</div>
					@endforeach
				</div>
				
			</div>
			
		</div>
	</div>
</div>


@include('layouts.footer')