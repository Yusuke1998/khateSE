@include('layouts.header')
@include('layouts.navbar')

<div class="container animated fadeIn mt-5 py-5" >

	<div class="row">

		<div class="col-4">
			<div class="row">
				<div class="col-12 mb-3">

					<div class="card testimonial-card">
						<div class="card-up cyan lighten-3"></div>
						<div class="avatar mx-auto white">
							<img src="{{ asset('storage/'.$me->people->avatar) }}" class="rounded-circle" alt="404">
						</div>
						<div class="card-body">
							<h4 class="card-title">{{ $me->people->first_name }} {{ $me->people->last_name }}</h4>
							<p class="lead">{{ $me->type }}</p>
							@if( $me->about )
								<hr>
								<p><i class="fa fa-quote-left mr-2"></i>{{ $me->about }}</p>
							@endif
						</div>
					</div>

				</div>
			</div>

			<div class="row"><div class="col"></div></div>
		</div>

		<div class="col-8">

			<div class="row">
				<div class="col">

					<div class="card">
						<div class="card-header cyan lighten-3 dark-text">
							<h3 class="d-flex justify-content-between align-items-center">
								<span><i class="fas fa-user mr-2"></i> Perfil</span>
								<button class="btn cyan lighten-2 btn-md" data-toggle="modal" data-target="#editar">
									<i class="fas fa-edit mr-2"></i>Editar
								</button>
							</h3>
						</div>
						<div class="card-body">

							<div class="row">
								<div class="col-2 text-right font-weight-bold h6">Nombre:</div>
								<div class="col-4">{{ $me->people->first_name }}</div>
							</div>

							<div class="row my-3">
								<div class="col-2 text-right font-weight-bold h6">Apellido:</div>
								<div class="col-4">{{ $me->people->last_name }}</div>
							</div>

							<div class="row mb-3">
								<div class="col-2 text-right font-weight-bold h6">Correo:</div>
								<div class="col-4">{{ $me->email }}</div>


								<!-- {{--<div class="col-2 text-right font-weight-bold">Clave:</div>
								<div class="col-4 d-flex justify-content-between">
									<input type="password" id="clave" class="form-control px-1 w-75" readonly value="{{ decrypt($me[0]->password) }}">
									<button class="btn btn-primary p-2" id="reveal" type="button">
										<i class="fas fa-eye ml-2"></i>
									</button>
								</div>--}} -->
							</div>
							<div class="row">
								<div class="col-2 text-right font-weight-bold h6">Cuenta:</div>
								<div class="col-4">{{ $me->type}}</div>
							</div>

						</div>
					</div>

				</div>
			</div>


		</div>
	</div>

</div>


<!-- Modal -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar perfil</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('editarperfil') }}" method="post" enctype="multipart/form-data">
				@csrf

				<input type="hidden" name="peopleid" value="{{ $me->people_id }}">
				<input type="hidden" name="userid" value="{{ $me->id }}">

				<div class="modal-body px-4">

					<div class="form-row">
						<!-- <div class="col md-form">
							<i class="fas fa-id-card prefix"></i>
							<input type="text" name="pin" readonly id="pin" class="form-control" value="{{ $me->people->pin }}">
							<label for="pin">Cédula</label>
						</div> -->
						<div class="col md-form">
							<i class="fas fa-user prefix"></i>
							<input type="text" name="first_name" id="name" class="validate form-control"  pattern="^[a-zA-Záéíóú]+(?:\s?[a-zA-Záéíóú]\s?)+$" value="{{ $me->people->first_name }}" required>
							<label for="name">Nombre</label>
						</div>
						<div class="col md-form">
							<i class="fas fa-user prefix"></i>
							<input type="text" name="last_name" id="apellido" class="validate form-control" required pattern="^[a-zA-Záéíóú]+(?:\s?[a-zA-Záéíóú]\s?)+$" value="{{ $me->people->last_name }}">
							<label for="apellido">Apellido</label>
						</div>
					</div>

					<div class="form-row">
						<!-- <div class="col md-form">
							<i class="fas fa-phone prefix"></i>
							<input type="text" maxlength="11" minlength="10" name="phone" id="phone" class="validate form-control" required pattern="^[\d]+$" value="{{ $me->people->phone }}">
							<label for="phone">Teléfono</label>
						</div> -->
					</div>

					<div class="form-row">
						<div class="col md-form">
							<i class="fas fa-envelope prefix"></i>
							<input type="email" name="email" id="correo" class="validate form-control" required value="{{ $me->email }}">
							<label for="correo">Correo Electrónico</label>
						</div>
						<!-- <div class="col md-form">
							<i class="fas fa-user prefix"></i>
							<input name="about" type="text" length="255" class="form-control" maxlength="255" id="about" value="{{ $me->about }}">
							<label for="about">Acerca de ti</label>
						</div> -->
					</div>

					<div class="form-row mb-3">
						<div class="col-md-6 md-form">
						    <div class="file-field">
						        <div class="btn btn-primary btn-md float-left">
						            <i class="fas fa-file-upload"></i>
						            <input type="file" name="file" accept="image/*">
						        </div>
						        <div class="file-path-wrapper">
						            <input class="file-path validate" type="text" placeholder="Sube tu foto de perfil">
						        </div>
						    </div>
						</div>

						<div class="col-md-6 md-form">
							<i class="fas fa-user-circle prefix"></i>
							<select name="type" id="type" class="mdb-select ml-5">
								<option disabled selected>Tipo de cuenta</option>
								<option value="student">Estudiante</option>
								<option value="teacher">Profesor</option>
							</select>
						</div>
					</div>


					{{-- <div class="form-row mb-3">
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
					</div> --}}


				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-md" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn cyan lighten-3 btn-md"><i class="fas fa-edit mr-2"></i>Editar</button>
				</div>
			</form>
		</div>
	</div>
</div>


@include('layouts.footer')