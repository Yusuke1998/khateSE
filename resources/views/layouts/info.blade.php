<div align="center">
	@foreach($errors->all() as $error)
		<section class="content-header">
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							{{$error}}
						</div>
					</div>
				</div>
		</section>
	@endforeach

	@if(session('info'))
		<section class="content-header">
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-warning alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							{{ session('info') }}
						</div>
					</div>
				</div>
		</section>
	@endif
</div>