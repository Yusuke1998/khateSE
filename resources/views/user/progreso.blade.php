@include('layouts.header')
@include('layouts.navbar')

<div class="container my-5 pt-5 animated fadeIn">
	<div class="row">
		<div class="col-3">
			<div class="row">
				<div class="col-12 mb-3">

					<div class="card testimonial-card">
						<div class="card-up red lighten-1"></div>
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
		<div class="col-md-9">
			<div class="card">
				<h4 class="card-header red ligthen-1 white-text d-flex justify-content-between">
					<span><i class="fas fa-line-chart mr-2"></i>Tu progreso</span>
					<a href="{{ url('certificado') }}" class="btn btn-md btn-elegant {{ $people[0]->isgraduated != 0 ? '' : 'disabled' }}">
						<i class="fas fa-certificate mr-2"></i>Cerfiticado
					</a>
				</h4>
				<div class="card-body">
					<table id="notasdt" class="table table-hover table-sm table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="th-sm">FECHA</th>
								<th class="th-sm">ENLACE</th>
								<th class="th-sm">TEMA</th>
								<th class="th-sm">NOTA</th>
							</tr>
						</thead>
						<tbody>
							@foreach( $notas as $n )
								<tr>
									<td>{{ $n->created_at }}</td>
									<td>{{ $n->test->link }}</td>
									<td>{{ $n->test->topic->topic }}</td>
									<td>{{ $n->note }}</td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>FECHA</th>
								<th>ENLACE</th>
								<th>TEMA</th>
								<th>NOTA</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@include('layouts.footer')