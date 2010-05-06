@include('layouts.header')
@include('layouts.navbar')

<br>

<div class="container mt-5 py-5">

	<div class="row animated fadeIn">

		<div class="col-4">
			<div class="row">
				<div class="col-12 mb-3">

					<div class="card testimonial-card">
						<div class="card-up red lighten-1"></div>
						<div class="avatar mx-auto white">
							<img src="{{ asset('images/img5.jpg') }}" class="rounded-circle" alt="woman avatar">
						</div>
						<div class="card-body">
							<h4 class="card-title">Jose Lopez</h4>
							<p>Estudiante</p>
							<hr>
							<p><i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, adipisci</p>
						</div>
					</div>

				</div>
			</div>

			<div class="row"><div class="col"></div></div>
		</div>

		<div class="col-8">

			<div class="row">
				<div class="col">

					<div class="card hoverable">
						<div class="card-header red lighten-1 white-text">
							<h3><i class="fas fa-user mr-2"></i> Perfil</h3>
						</div>
						<div class="card-body">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis voluptate eum explicabo saepe dicta, nisi, natus minima voluptatum pariatur ipsum totam impedit voluptas consequuntur distinctio. Assumenda quos illo sequi quasi.
						</div>
					</div>

				</div>
			</div>

			<div class="row"><div class="col"></div></div>

		</div>
	</div>

</div>

@include('layouts.footer')