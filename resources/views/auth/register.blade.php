@include('layouts.header')

<div class="centrado-vertical">

	<div class="card animated fadeIn" style="width: 600px">

		<div class="card-header red lighten-1 white-text text-center">
			<h3>Regístrate</h3>
		</div>
		<div class="card-body px-5">
			<form action="{{ url('register') }}" method="post">
				@csrf
				<div class="form-row">
					<div class="col md-form">
						<i class="fas fa-id-card prefix"></i>
						<input type="text" minlength="7" maxlength="9" name="pin" id="pin" class="validate form-control{{ $errors->has('pin') ? ' is-invalid' : '' }}" pattern="^[\d]{7,9}$" required>
						<label for="pin">Cédula</label>
						@if ($errors->has('pin'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('pin') }}</strong>
							</span>
						@endif
					</div>
					<div class="col md-form">
						<i class="fas fa-user prefix"></i>
						<input type="text" name="first_name" id="name" class="validate form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" value="{{ old('first_name') }}" pattern="^[a-zA-Záéíóú]+(?:\s?[a-zA-Záéíóú]\s?)+$" required>
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

				<div class="form-row mb-3">
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

				<button type="button" class="btn btn-md btn-elegant" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-md btn-danger"><i class="fas fa-save mr-2"></i>Guardar</button>
			</form>
		</div>

	</div>
</div>

<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/mdb.min.js') }}"></script>

<script>
	$('.mdb-select').materialSelect();
</script>