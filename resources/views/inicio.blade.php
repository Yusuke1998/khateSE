<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Software Educativo (Redes)</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
	<div class="card card-image" style="background: linear-gradient(#C7F9FF, #DCEFFF)">
		<div class="py-5 px-4 my-5 container">
			<div class="row">
				<div class="col animated slideInLeft white-text delay-1s d-flex align-items-center">
					<div>
						<h1 style="color: #3C3533; font-size: 45px;" class="font-weight-bold text-center animated zoomIn delay-2s">Software Educativo (Redes)</h1>
						<hr class="my-4">
						<div class="d-flex justify-content-center mt-5 animated zoomIn delay-2s">
							<button class="btn btn-md cyan lighten-2" data-toggle="modal" href="#register">
								<i class="fas fa-user-plus mr-2"></i>Regístrate
							</button>
						</div>
					</div>
				</div>

				<div class="col-1"></div>
				<div class="col animated slideInRight">
					<div class="card opacity">
						<h3 style="color: #3C3533;" class="card-header cyan lighten-3 text-center py-4">
							<strong>Ingresa a la plataforma!</strong>
						</h3>
						<div class="card-body px-5 mx-3">
							<form action="{{ route('login') }}" method="post">
								@csrf

								<div class="form-row">
									<div class="col md-form">
										<i class="fas fa-envelope prefix"></i>
										<input type="email" autofocus="true" name="email" id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }} validate" value="{{ old('email') }}" required>
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
										<input type="password" autofocus="true" name="password" id="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" required>
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
									<button class="btn cyan lighten-2" type="submit"><i class="fas fa-sign-in-alt mr-2"></i>Entrar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container my-5">
		<!-- Intro de la herramienta -->
		<h2 class="text-center mt-5 wow fadeInDownBig">¿Estas listo? ¡Empieza ya!</h2>
		<hr class="w-25 mb-5">
		<!-- Row 1 -->
		<div class="row">
			<div class="col-6">
				<div class="mb-3 wow zoomIn"><br><br><br>
					<h5 class="text-center d-flex align-items-center">Software educatico dedicado al area de Redes, digido principalmente a estudiantes y tambien a profesores del area de Ingenieria de Sistemas de la Universidad Nacional Experimental Rómulo Gallegos.</h5>
				</div>
			</div>
			<div class="col-6">
				<div class="row mb-3 wow bounceInRight p-2">
					<!-- <div class="col-1"></div> -->
					<img src="{{ asset('images/avatar_estudiante.png') }}" alt="404" class=" ml-3 img-fluid img-thumbnail">
					<!-- <div class="col-1"></div> -->
					<img src="{{ asset('images/avatar_prof.png') }}" alt="404" class="ml-4 img-fluid img-thumbnail">
				</div>
			</div>
		</div><br><br>
		<hr class="my-4">

		<!-- Row 2 -->
		<div class="row">

			<div class="col wow wobble">
				<div class=" view overlay zoom">
					<img src="{{ asset('images/home_prof.png') }}" alt="404" class="img-fluid img-thumbnail">
				</div>
			</div>
			<div class="col-1"></div>
			<div class="col wow zoomIn d-flex align-items-center">
				<h5 class="text-center">Los profesores pueden tener acceso y control total al sistema, manejando desde su perfil el contenido a impartir en clase.</h5>
			</div>
		</div>
		<hr class="my-5">

		<!-- Row 3 -->
	
		<div class="row mb-4">
			<div class="col wow animated zoomIn">
				<h5 class="text-center">Añadir contenido multimedia y textual clasificado por temas con respectivas imagenes y archivos para los estudiantes. </h5>
			</div>
		</div>
		<div class="row">
			<div class="col wow view overlay zoom animated bounceInRight ">
				<img src="{{ asset('images/aniadir_tema_prof.png') }}" alt="404" class="img-dimentions img-fluid img-thumbnail">
			</div>
			<div class="col view wow animated rubberBand overlay zoom">
				<img src="{{ asset('images/aniadir_cont_textual_prof.png') }}" alt="404" class="img-dimentions img-fluid img-thumbnail">
			</div>
			<div class="col wow animated bounceInLeft view overlay zoom">
				<img src="{{ asset('images/aniadir_cont_multimedia_prof.png') }}" alt="404" class="img-dimentions img-fluid img-thumbnail">
			</div>
		</div>

		<br><br><br><br>

		
		<div class="row">
			<div class="col wow zoomIn">
				<h5 class="text-center">Estructurar y formular todas y cada una de la pruebas que realizarán durante el semestre, organizadas por secciones y a su vez estos por sus unidades correspondientes, también puede controlar y saber el número o matrícula total de estudiantes en cada sección.</h5>
			</div>
		</div>
		<div class="row">
			<div class="col wow zoomInDown view overlay zoom"><br><br>
				<img src="{{ asset('images/temas_prof.png') }}" alt="404" class="img-dimentions img-fluid img-thumbnail">
			</div>
			<div class="col wow zoomInDown view overlay zoom"><br><br>
				<img src="{{ asset('images/estudiantes_prof.png') }}" alt="404" class="img-dimentions img-fluid img-thumbnail">
			</div>
			<div class="col wow view zoomInDown overlay zoom"><br><br>
				<img src="{{ asset('images/form_3.png') }}" alt="404" class="img-dimentions img-fluid img-thumbnail">
			</div>
		</div>


		<hr class="my-5">
		
		<div class="row wow zoomIn mb-4">
			<div class="col">
				<h5 class="text-center">Y desde luego, cada estudiante perteneciente a una clase puede realizar las pruebas asignadas por su profesor, estar al tanto de todo el contenido educativo, textual y/o audiovisual disponible para él o ella, asi como tener la libertad del tema sobre el cual quiere aprender.</h5>
			</div>
		</div>
		<div class="row">
			<div class="col wow zoomInUp view overlay zoom"><br><br>
				<img src="{{ asset('images/temas.png') }}" alt="404" class="img-dimentions img-fluid img-thumbnail">
			</div>
			<div class="col wow zoomInUp view overlay zoom"><br><br>
				<img src="{{ asset('images/home_estudiante.png') }}" alt="404" class="img-dimentions img-fluid img-thumbnail">
			</div>
			<div class="col wow zoomInUp view overlay zoom"><br><br>
				<img src="{{ asset('images/form_1.png') }}" alt="404" class="img-dimentions img-fluid img-thumbnail">
			</div>
		</div>
		<hr class="my-5">
		<!-- Fin de la intro -->
		<h2 class="text-center mt-5 wow fadeInDownBig">Nuestros estudiantes</h2>
		<hr class="w-25 mb-5">
		<div class="my-5 py-2 wow fadeInUpBig">
			<!--Carousel Wrapper-->
			<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
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
									<h4 class="card-title">Katherin Gamez</h4>
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
									<h4 class="card-title">Maholys Zapata</h4>
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
									<h4 class="card-title">Pepito Fuentes</h4>
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
				<div class="col text-center mx-auto">
					<!-- Content -->
					<h5 class="font-weight-bold text-uppercase mt-3 mb-4">
						Software Educativo
					</h5>
					<p>Desarrollado para compartir e impartir conocimiento entorno al estudio de las redes y telecomucicaciones.</p>
				</div>
				<!-- Grid column -->
				<hr class="clearfix w-100 d-md-none">
			</div>
			<!-- Grid row -->
			<hr>
			<!-- Call to action -->
			<ul class="list-unstyled list-inline text-center py-2">
				<li class="list-inline-item">
					<a href="#register" data-toggle="modal" class="btn cyan lighten-2 btn-rounded"><i class="fas fa-user-plus mr-2"></i> Regístrate</a>
				</li>
			</ul>
			<!-- Call to action -->
		</div>
		<div class="footer-copyright text-center py-3">© 2018 Copyright:
			<a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
		</div>
	</footer>

	{{-- MODAL REGISTRO --}}

	<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header cyan lighten-3 dark-text">
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
								<i class="fas fa-user prefix"></i>
								<input type="text" name="first_name" id="name" class="validate form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" value="{{ old('first_name') }}" pattern="^[a-zA-Záéíóú]+(?:\s?[a-zA-Záéíóú]\s?)+$">
								<label for="name">Nombre</label>
								@if ($errors->has('first_name'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('first_name') }}</strong>
									</span>
								@endif
							</div>
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
								<select name="type" class="mdb-select colorful-select dropdown-primary" id="type" required>
									<option disabled selected>Selecciona un tipo de cuenta</option>
									<option value="student">Estudiante</option>
									<option value="teacher">Profesor</option>
								</select>
							</div>

							<div class="col md-form">
								<select name="section_id" class="mdb-select colorful-select dropdown-primary" id="type" required>
									<option disabled selected>Si eres estudiante selecciona tu sección</option>
									@foreach($sections as $section)
									<option value="{{ $section->id }}">{{ $section->section }}</option>}
									option
									@endforeach
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
						<button type="button" class="btn btn-md cyan" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-md cyan lighten-2"><i class="fas fa-save mr-2"></i>Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	{{-- FIN MODAL REGISTRO --}}
	
	<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('js/mdb.min.js') }}"></script>
	<script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>