@include('layouts.header')

<div class="centrado-vertical animated fadeIn">

	<div class="card hoverable" style="width: 570px">
		<div class="card-header red lighten-1 white-text d-flex justify-content-between align-items-center">
			<h3><i class="fas fa-frown mr-3"></i>Desactivado</h3>
			<a class="white-text" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
				<h4><i class="fas fa-power-off mr-2"></i>Salir</h4>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
		</div>
		<div class="card-body">
			<p class="lead">Su cuenta ha sido desactivada hasta nuevo aviso, si cree que se trata de un error comuniquese inmediatamente con su administrador.</p>
		</div>
	</div>
</div>