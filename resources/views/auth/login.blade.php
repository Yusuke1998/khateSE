@include('layouts.header')

<div class="centrado-vertical">

	<div class="card animated fadeIn" style="width: 400px">
		<h3 class="card-header danger-color white-text text-center py-4">
			<strong>Entrar a la plataforma</strong>
		</h3>
		<div class="card-body px-5 mx-3">
			<form action="{{ route('login') }}" method="post">
				@csrf

				<div class="form-row">
					<div class="col md-form">
						<i class="fas fa-envelope prefix"></i>
						<input type="email" autofocus name="email" id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }} validate" value="{{ old('email') }}" required>
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
							<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
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

<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/mdb.min.js') }}"></script>