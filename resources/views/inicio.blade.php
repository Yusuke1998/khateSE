<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Software Educativo</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>


	{{-- MODAL REGISTRO --}}

	<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header red lighten-1 white-text">
					<h5 class="modal-title" id="exampleModalLabel">Regístrate</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="{{ url('register') }}" method="post">
					@csrf
					<div class="modal-body px-5">

						<div class="form-row">
							<div class="col md-form">
								<i class="fas fa-id-card prefix"></i>
								<input type="text" minlength="7" maxlength="9" name="pin" id="pin" class="validate form-control{{ $errors->has('pin') ? ' is-invalid' : '' }}" pattern="^[\d]{7,10}$">
								<label for="pin">Cédula</label>
								@if ($errors->has('pin'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('pin') }}</strong>
									</span>
								@endif
							</div>
							<div class="col md-form">
								<i class="fas fa-user prefix"></i>
								<input type="text" name="first_name" id="name" class="validate form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" value="{{ old('first_name') }}" pattern="^[a-zA-Záéíóú]+(?:\s?[a-zA-Záéíóú]\s?)+$">
								<label for="name">Nombre</label>
								@if ($errors->has('first_name'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('first_name') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-row">
							<div class="col md-form">
								<i class="fas fa-user prefix"></i>
								<input type="text" name="last_name" id="apellido" class="validate form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" required pattern="^[a-zA-Záéíóú]+(?:\s?[a-zA-Záéíóú]\s?)+$" value="{{ old('last_name') }}"e>
								<label for="apellido">Apellido</label>
								@if ($errors->has('last_name'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('last_name') }}</strong>
									</span>
								@endif
							</div>
							<div class="col md-form">
								<i class="fas fa-phone prefix"></i>
								<input type="text" maxlength="11" minlength="10" name="phone" id="phone" class="validate form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" required pattern="^[\d]+$">
								<label for="phone">Teléfono</label>
								@if ($errors->has('phone'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('phone') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-row">
							<div class="col md-form">
								<i class="fas fa-envelope prefix"></i>
								<input type="email" name="email" id="correo" class="validate form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
								<label for="correo">Correo Electrónico</label>
								@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
							<div class="col md-form">
								<i class="fas fa-user-circle prefix"></i>
								<select name="type" class="ml-5 mdb-select colorful-select dropdown-dark" id="type" required>
									<option disabled selected>Selecciona un tipo de cuenta</option>
									<option value="Estudiante">Estudiante</option>
									<option value="Profesor">Profesor</option>
								</select>
							</div>

						</div>

						<div class="form-row">
							<div class="col md-form">
								<i class="fas fa-key prefix"></i>
								<input type="password" id="pass" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
								<label for="pass">Contraseña</label>
								@if ($errors->has('password'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
							</div>
							<div class="col-md-6 md-form">
								 <i class="fas fa-key prefix"></i>
								<input type="password" id="passw" name="password_confirmation" class="form-control" required>
								<label for="passw">Repita Contraseña</label>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-md btn-elegant" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-md btn-danger"><i class="fas fa-save mr-2"></i>Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	{{-- FIN MODAL REGISTRO --}}


	<div class="card card-image" style="background-image: url({{ asset('images/img.jpg') }}); background-attachment: fixed; background-position: bottom;">
		<div class="py-5 px-4 my-5 container">
			<div class="row">

				<div class="col animated slideInLeft white-text delay-1s">
					<h1 class="font-weight-bold">Software Educativo</h1>
					<hr>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, obcaecati voluptatem ducimus aut accusantium sunt aut accusantium sunt.</p>
					<a class="btn btn-md btn-danger" data-toggle="modal" href="#register"><i class="fas fa-user-plus mr-2"></i>Regístrate</a>
				</div>

				<div class="col animated slideInRight">
					<div class="card opacity">
						<h3 class="card-header danger-color white-text text-center py-4">
							<strong>Entrar a la plataforma</strong>
						</h3>
						<div class="card-body px-5 mx-3">
							<form action="{{ route('login') }}" method="post">
								@csrf

								<div class="form-row">
									<div class="col md-form">
										<i class="fas fa-envelope prefix"></i>
										<input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }} validate" value="{{ old('email') }}" required>
										<label for="email">Correo Electrónico</label>
										@if ($errors->has('email'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="form-row">
									<div class="col md-form">
										<i class="fas fa-key prefix"></i>
										<input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" required>
										<label for="password">Contraseña</label>
										@if ($errors->has('password'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="d-flex justify-content-around mt-4">
									<div>
										<div class="form-check">
											<input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
											<label class="form-check-label" for="remember">Recuérdame</label>
										</div>
									</div>
									<div>
										<a href="{{ route('password.request') }}">¿Olvidó su contraseña?</a>
									</div>
								</div>

								<div class="mt-5 text-center">
									<button class="btn btn-danger" type="submit"><i class="fas fa-sign-in-alt mr-2"></i>Entrar</button>
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>


	<div class="container my-5">

		<h2 class="text-center mt-5 wow fadeInDownBig">About Software Educativo</h2>
		<hr class="w-25 mb-5">

		<div class="row">
			<div class="col">
				<div class="row mb-3 wow rollIn">
					<div class="col-1">
						<i class="fas fa-code fa-2x"></i>
					</div>
					<div class="col ml-3">
						<h5>Lorem ipsum dolor sit amet.</h5>
						<p>coñooooooo q pasaaaaaaaaaaaaaaaaaLorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					</div>
				</div>
				<div class="row mb-3 wow rollIn">
					<div class="col-1">
						<i class="fas fa-code fa-2x"></i>
					</div>
					<div class="col ml-3">
						<h5>Lorem ipsum dolor sit amet.</h5>
						<p>coñooooooo q pasaaaaaaaaaaaaaaaaaLorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					</div>
				</div>
				<div class="row mb-3 wow rollIn">
					<div class="col-1">
						<i class="fas fa-code fa-2x"></i>
					</div>
					<div class="col ml-3">
						<h5>Lorem ipsum dolor sit amet.</h5>
						<p>coñooooooo q pasaaaaaaaaaaaaaaaaaLorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					</div>
				</div>
				<div class="row mb-3 wow rollIn">
					<div class="col-1">
						<i class="fas fa-code fa-2x"></i>
					</div>
					<div class="col ml-3">
						<h5>Lorem ipsum dolor sit amet.</h5>
						<p>coñooooooo q pasaaaaaaaaaaaaaaaaaLorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					</div>
				</div>
			</div>
			<div class="col wow slideInRight delay-1s">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita provident hic natus eum repudiandae aliquam sapiente a alias. neque nulla cupiditate nesciunt, ad et est assumenda deserunt, eligendi quibusdam nisi.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam ab ducimus molestiae laborum perspiciatis praesentium facilis sit debitis vero, veritatis, dolorem nam nihil eum molestias ex optio! Esse, debitis tenetur.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat facere voluptatem, error, facilis, sed quo quidem voluptas praesentium quibusdam dignissimos eveniet atque magnam. Perferendis, qui saepe magnam inventore aliquid dolorum.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum placeat vel sed nihil debitis id sit optio adipisci ipsum cum alias inventore, tempore nam cupiditate atque, repellat, quam voluptates. Aut.</p>
			</div>
		</div>


		<h2 class="text-center mt-5 wow fadeInDownBig">Nuestros estudiantes</h2>
		<hr class="w-25 mb-5">


		<div class="my-5 py-2 wow fadeInUpBig">

			<!--Carousel Wrapper-->
			<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

				<!--Controls-->
				{{-- <div class="controls-top">
					<a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
					<a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
				</div> --}}
				<!--/.Controls-->

				<!--Indicators-->
				<ol class="carousel-indicators">
					<li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
					<li data-target="#multi-item-example" data-slide-to="1"></li>
					<li data-target="#multi-item-example" data-slide-to="2"></li>
				</ol>
				<!--/.Indicators-->

				<!--Slides-->
				<div class="carousel-inner" role="listbox">

					<!--First slide-->
					<div class="carousel-item active">

						<div class="col-md-4">
							<div class="card testimonial-card mr-5 hoverable">
								<div class="card-up indigo lighten-1"></div>
								<div class="avatar mx-auto white">
									<img src="{{ asset('images/img1.jpg') }}" class="rounded-circle" alt="woman avatar">
								</div>
								<div class="card-body">
									<h4 class="card-title">karla Villegas</h4>
									<hr>
									<p><i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam nostrum non dolor iusto sequi rerum a atque eos cupiditate rem.</p>
								</div>
							</div>
						</div>

						<div class="col-md-4 clearfix d-none d-md-block">
							<div class="card testimonial-card mr-5 hoverable">
								<div class="card-up indigo lighten-1"></div>
								<div class="avatar mx-auto white">
									<img src="{{ asset('images/img2.jpg') }}" class="rounded-circle" alt="woman avatar">
								</div>
								<div class="card-body">
									<h4 class="card-title">Loriana Machado</h4>
									<hr>
									<p><i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam nostrum non dolor iusto sequi rerum a atque eos cupiditate rem.</p>
								</div>
							</div>
						</div>

						<div class="col-md-4 clearfix d-none d-md-block">
							<div class="card testimonial-card mr-5 hoverable">
								<div class="card-up indigo lighten-1"></div>
								<div class="avatar mx-auto white">
									<img src="{{ asset('images/img5.jpg') }}" class="rounded-circle" alt="woman avatar">
								</div>
								<div class="card-body">
									<h4 class="card-title">Jose Lopez</h4>
									<hr>
									<p><i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam nostrum non dolor iusto sequi rerum a atque eos cupiditate rem.</p>
								</div>
							</div>
						</div>

					</div>
					<!--/.First slide-->

					<!--Second slide-->
					<div class="carousel-item">

						<div class="col-md-4">
							<div class="card testimonial-card mr-5 hoverable">
								<div class="card-up indigo lighten-1"></div>
								<div class="avatar mx-auto white">
									<img src="{{ asset('images/img4.jpg') }}" class="rounded-circle" alt="woman avatar">
								</div>
								<div class="card-body">
									<h4 class="card-title">Karelys Lopez</h4>
									<hr>
									<p><i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam nostrum non dolor iusto sequi rerum a atque eos cupiditate rem.</p>
								</div>
							</div>
						</div>

						<div class="col-md-4 clearfix d-none d-md-block">
							<div class="card testimonial-card mr-5 hoverable">
								<div class="card-up indigo lighten-1"></div>
								<div class="avatar mx-auto white">
									<img src="{{ asset('images/img3.jpg') }}" class="rounded-circle" alt="woman avatar">
								</div>
								<div class="card-body">
									<h4 class="card-title">Francis Rios</h4>
									<hr>
									<p><i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam nostrum non dolor iusto sequi rerum a atque eos cupiditate rem.</p>
								</div>
							</div>
						</div>

						<div class="col-md-4 clearfix d-none d-md-block">
							<div class="card testimonial-card mr-5 hoverable">
								<div class="card-up indigo lighten-1"></div>
								<div class="avatar mx-auto white">
									<img src="{{ asset('images/img6.jpg') }}" class="rounded-circle" alt="woman avatar">
								</div>
								<div class="card-body">
									<h4 class="card-title">Julio Yanez</h4>
									<hr>
									<p><i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam nostrum non dolor iusto sequi rerum a atque eos cupiditate rem.</p>
								</div>
							</div>
						</div>

					</div>
					<!--/.Second slide-->

					<!--Third slide-->
					<div class="carousel-item">

						<div class="col-md-4">
							<div class="card testimonial-card mr-5 hoverable">
								<div class="card-up indigo lighten-1"></div>
								<div class="avatar mx-auto white">
									<img src="{{ asset('images/img7.jpg') }}" class="rounded-circle" alt="woman avatar">
								</div>
								<div class="card-body">
									<h4 class="card-title">Cesar Padrino</h4>
									<hr>
									<p><i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam nostrum non dolor iusto sequi rerum a atque eos cupiditate rem.</p>
								</div>
							</div>
						</div>

						<div class="col-md-4 clearfix d-none d-md-block">
							<div class="card testimonial-card mr-5 hoverable">
								<div class="card-up indigo lighten-1"></div>
								<div class="avatar mx-auto white">
									<img src="{{ asset('images/img8.jpg') }}" class="rounded-circle" alt="woman avatar">
								</div>
								<div class="card-body">
									<h4 class="card-title">Gibert Carrera</h4>
									<hr>
									<p><i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam nostrum non dolor iusto sequi rerum a atque eos cupiditate rem.</p>
								</div>
							</div>
						</div>

						<div class="col-md-4 clearfix d-none d-md-block">
							<div class="card testimonial-card mr-5 hoverable">
								<div class="card-up indigo lighten-1"></div>
								<div class="avatar mx-auto white">
									<img src="{{ asset('images/img9.jpg') }}" class="rounded-circle" alt="woman avatar">
								</div>
								<div class="card-body">
									<h4 class="card-title">Yessebel Avila</h4>
									<hr>
									<p><i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam nostrum non dolor iusto sequi rerum a atque eos cupiditate rem.</p>
								</div>
							</div>
						</div>

					</div>
					<!--/.Third slide-->

				</div>
				<!--/.Slides-->

			</div>
			<!--/.Carousel Wrapper-->

		</div>

	</div>

	<footer class="page-footer font-small stylish-color-dark pt-4 wow fadeIn">

		<div class="container-fluid text-center text-md-left ">



			<!-- Grid row -->
			<div class="row">

				<!-- Grid column -->
				<div class="col-md-4 mx-auto">

					<!-- Content -->
					<h5 class="font-weight-bold text-uppercase mt-3 mb-4">Software Educativo</h5>
					<p>Here you can use rows and columns here to organize your footer content. Lorem ipsum dolor sit amet, consectetur
					adipisicing elit.</p>

				</div>
				<!-- Grid column -->

				<hr class="clearfix w-100 d-md-none">

				<!-- Grid column -->
				<div class="col-md-2 mx-auto">

					<!-- Links -->
					<h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

					<ul class="list-unstyled">
						<li>
							<a href="#!">Link 1</a>
						</li>
						<li>
							<a href="#!">Link 2</a>
						</li>
						<li>
							<a href="#!">Link 3</a>
						</li>
						<li>
							<a href="#!">Link 4</a>
						</li>
					</ul>

				</div>
				<!-- Grid column -->

				<hr class="clearfix w-100 d-md-none">

				<!-- Grid column -->
				<div class="col-md-2 mx-auto">

					<!-- Links -->
					<h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

					<ul class="list-unstyled">
						<li>
							<a href="#!">Link 1</a>
						</li>
						<li>
							<a href="#!">Link 2</a>
						</li>
						<li>
							<a href="#!">Link 3</a>
						</li>
						<li>
							<a href="#!">Link 4</a>
						</li>
					</ul>

				</div>
				<!-- Grid column -->

			</div>
			<!-- Grid row -->




			<hr>
			<!-- Call to action -->
			<ul class="list-unstyled list-inline text-center py-2">
				<li class="list-inline-item">
					<a href="#register" data-toggle="modal" class="btn btn-danger btn-rounded"><i class="fas fa-user-plus mr-2"></i> Regístrate</a>
				</li>
			</ul>
			<!-- Call to action -->
		</div>

		<div class="footer-copyright text-center py-3">© 2018 Copyright:
			<a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
		</div>

	</footer>

	<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('js/mdb.min.js') }}"></script>
	<script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>