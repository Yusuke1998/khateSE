@include('layouts.header')
@include('layouts.navbar')

<br>
<div class="container my-5 pt-4">

	<div class="row animated fadeIn">
		<div class="col-md-3 col-sm-12">

			<div class="row">
				<div class="col-12 mb-4">

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
								<p><i class="fa fa-quote-left mr-2"></i> {{ $me->about }}</p>
							@endif
						</div>
					</div>

				</div>

				<div class="col-12">

					<div class="card mb-5">
						<div class="card-header red lighten-1 white-text">
							<h5 class="d-flex justify-content-between">
								<span><i class="fas fa-book mr-2"></i>Temas</span>
								<span>{{ $topics->count() }}</span>
							</h5>
						</div>
						<div class="card-body">
							<ul class="list-group">
								@foreach( $topics as $topic )
									<li class="list-group-item">
										{{ $topic->topic }}
										{{-- <a href='{{ url("home/$topic->topic") }}'>{{ $topic->topic }}</a> --}}
									</li>
								@endforeach
							</ul>
						</div>
					</div>

				</div>
			</div>

		</div>
		<div class="col-md-6 col-sm-12">

			<div class="row mb-5">
				<div class="col">

					<div class="card hoverable">
						<form action="{{ url('publicar') }}" method="post" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="peopleid" value="{{ Auth::user()->people_id }}">

							<div class="card-body">

								<div class="form-row">
									<div class="col">
										<label for="publicar"><i class="fas fa-edit mr-2"></i>Escribe tu mensaje aquí...</label>
										<textarea name="publicar" id="publicar" class="form-control" required></textarea>
									</div>
								</div>

								<div class="form-row mt-3">
									<div class="col">
										<select class="browser-default custom-select" required name="topicid">
											<option selected disabled>Tema en el cual publicar.</option>
											@foreach( $topics as $t )
												<option value="{{ $t->id }}">{{ $t->topic }}</option>
											@endforeach
										</select>
									</div>
								</div>

							</div>
							<div class="card-footer py-0">

								<div class="d-flex justify-content-between align-items-center">
									<div class="file-field md-form">
										<div class="btn btn-danger btn-sm float-left px-2">
											<i class="fas fa-file-upload fa-2x"></i>
											<input type="file" name="file">
										</div>
										<div class="file-path-wrapper">
											<input class="file-path validate form" type="text" placeholder="Sube un archivo">
										</div>
									</div>
									<div>
										<button class="btn px-2 btn-sm btn-elegant" type="reset"><i class="fas fa-times mr-2"></i>Cancelar</button>
										<button class="btn px-2 btn-sm btn-danger" type="submit"><i class="fas fa-send mr-2"></i>Publicar</button>
									</div>
								</div>

							</div>
						</form>
					</div>

					<div class="card mt-3">
						<div class="card-body py-0">
							<form action="{{ url('filtro') }}" method="post" id="topicidform">
								@csrf
								<select class="mdb-select md-form" name="topicid" id="topicid">q
									<option disabled selected>Filtrar las publicaciones por temas</option>
									@foreach( $topics as $t )
										<option value="{{ $t->id }}">{{ $t->topic }}</option>
									@endforeach
								</select>
							</form>
						</div>
					</div>

				</div>
			</div>

			@if( session('success') )
				<div class="row mb-3">
					<div class="col">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<i class="fas fa-check mr-2"></i>{{ session('success') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
				</div>
			@endif

			<div class="row mb-4">
				<div class="col">
					@foreach( $posts as $post )
						<div class="card hoverable mb-4">
							<div class="card-body">
								<div class="row">
									<div class="col-2">
										<img class="rounded-circle" src="{{ asset('storage/'.$post->avatar) }}" width="60px" height="60px">
									</div>
									<div class="col-10">
										<div class="d-flex justify-content-between">
											<a href='{{ url("post/$post->id") }}' class="text-dark">
												<h6>
													<b>{{ $post->first_name }} {{ $post->last_name }}</b> ha publicado en {{ $post->topic }}
												</h6>
											</a>

											@if( Auth::user()->email == $post->email )
												<div class="btn-group">
													<button type="button" class="btn btn-link btn-sm p-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="fas fa-ellipsis-v fa-2x"></i>
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item editpost" data-postid="{{ $post->id }}" data-toggle="modal" href="#editpost">Editar</a>
														<a class="dropdown-item delpost" data-postid="{{ $post->id }}" data-toggle="modal" href="#delpost">Eliminar</a>
													</div>
												</div>
											@endif
										</div>
										@if( $post->type == 'Profesor' )
											<p class="text-muted m-0"><i class="fas fa-check-circle mr-1 text-success"></i> {{ $post->type }}</p>
										@endif
										<p class="text-muted m-0">{{ $carbon->diffForHumans($post->created_at) }}</p>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col">

										@if( preg_match('/^(http:\/\/|https:\/\/)/', $post->post) )

											<a href="{{ $post->post }}" target="_blank">{{ $post->post }}</a>

										@else
											<p class="mb-3">{{ $post->post }}</p>

										@endif

										@if( $post->file )

											@if( preg_match('/[\.jpg|\.jpeg|\.png]$/', $post->file) )

												<div class="view zoom overlay d-flex justify-content-center">
													<img class="img-fluid" src='{{ asset("storage/$post->file") }}' target="_blank">
												</div>

											@elseif( strrpos($post->file, '.txt') )

												<hr>
												<div class="row">
													<div class="col-1">
														<i class="fas fa-file-alt fa-2x grey-text"></i>
													</div>
													<div class="col-11">
														<a href='{{ asset("storage/$post->file") }}' target="_blank">{{ $post->file }}</a>
													</div>
												</div>

											@elseif( preg_match('/[\.pdf]$/', $post->file) )

												<hr>
												<div class="row">
													<div class="col-1">
														<i class="fas fa-file-pdf fa-2x red-text"></i>
													</div>
													<div class="col-10">
														<a href='{{ asset("storage/$post->file") }}' target="_blank">{{ $post->file }}</a>
													</div>
												</div>

											@elseif( preg_match('/[\.docx|\.doc|\.odt|\.otp|\.otg]$/', $post->file) )

												<hr>
												<div class="row">
													<div class="col-1">
														<i class="fas fa-file-word fa-2x blue-text"></i>
													</div>
													<div class="col-11">
														<a href='{{ asset("storage/$post->file") }}' target="_blank">{{ $post->file }}</a>
													</div>
												</div>

											@endif
										@endif
									</div>
								</div>
							</div>
							@if( isset($comments) && $comments->count() > 0 )
								@foreach( $comments as $comment )
									<div class="card-footer grey lighten-3 border">

										<div class="row">
											<div class="col-2">
												<img src="{{ asset('storage/'.$comment->avatar) }}" class="rounded-circle" width="50px" height="50px">
											</div>
											<div class="col-10">
												<div class="d-flex justify-content-between">
													<h6 class="pq">
														<b>{{ $comment->first_name }} {{ $comment->last_name }}</b> ha comentado
													</h6>

													@if( Auth::user()->email == $comment->email )
														<div class="btn-group">
															<button type="button" class="btn btn-link btn-sm p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																<i class="fas fa-ellipsis-h fa-2x"></i>
															</button>
															<div class="dropdown-menu">
																<a class="dropdown-item editcomment" data-id="{{ $comment->id }}" data-toggle="modal" href="#editcomment">Editar</a>
																<a class="dropdown-item delcomment" data-id="{{ $comment->id }}" data-toggle="modal" href="#delcomment">Eliminar</a>
															</div>
														</div>
													@endif
												</div>
												@if( $comment->type == 'Profesor' )
													<p class="text-muted m-0"><i class="fas fa-check-circle mr-1 text-success"></i> {{ $comment->type }}</p>
												@endif
												<p class="text-muted m-0">{{ $carbon->diffForHumans($comment->created_at) }}</p>
											</div>
										</div>
										<div class="row mt-2">
											<div class="col">
												<p>{{ $comment->comment }}</p>

												@if( $comment->file )

													@if( preg_match('/[\.jpg|\.jpeg|\.png]$/', $comment->file) )

														<div class="view zoom overlay">
															<img class="img-fluid" src='{{ asset("storage/$comment->file") }}' target="_blank">
														</div>

													@elseif( strrpos($comment->file, '.txt') )

														<hr>
														<div class="row">
															<div class="col-1">
																<i class="fas fa-file-alt fa-2x blue-text"></i>
															</div>
															<div class="col-11">
																<a href='{{ asset("storage/$comment->file") }}' target="_blank">{{ $comment->file }}</a>
															</div>
														</div>

													@elseif( strrpos($comment->file, '.pdf') )

														<hr>
														<div class="row">
															<div class="col-1">
																<i class="fas fa-file-pdf fa-2x red-text"></i>
															</div>
															<div class="col-11">
																<a href='{{ asset("storage/$comment->file") }}' target="_blank">{{ $comment->file }}</a>
															</div>
														</div>

													@elseif( preg_match('/[\.docx|\.doc|\.odt|\.otp|\.otg]$/', $comment->file) )

														<hr>
														<div class="row">
															<div class="col-1">
																<i class="fas fa-file-word fa-2x blue-text"></i>
															</div>
															<div class="col-11">
																<a href='{{ asset("storage/$comment->file") }}' target="_blank">{{ $comment->file }}</a>
															</div>
														</div>

													@endif
												@endif
											</div>
										</div>

									</div>
								@endforeach
							@endif
							<div class="card-footer py-0 d-flex justify-content-between align-items-center">
								<div class="mr-2">
									<img src="{{ asset('storage/'.$me->people->avatar) }}" class="border" width="40px" height="40px">
								</div>
								<form action="{{ url('comentar') }}" method="post" class="md-form ml-2 w-100" enctype="multipart/form-data">
									@csrf
									<div class="form-row">
										<div class="col">
											<input type="hidden" name="postid" value="{{ $post->id }}">
											<input type="hidden" name="peopleid" value="{{ Auth::user()->people_id }}">

											<input type="text" name="comentario" id="comentario" class="form-control float-left" required>
											<label for="comentario">Escribe una respuesta...</label>
										</div>
										<div class="col-1">
											<button type="submit" class="btn btn-sm btn-danger p-2">
												<i class="fas fa-comment"></i>
											</button>
										</div>
									</div>

									<div class="file-field">
										<div class="py-2 float-left">
											<i class="fas fa-file-upload"></i>
											<input type="file" name="filecomment">
										</div>
										<div class="file-path-wrapper">
											<input class="file-path validate" type="text" placeholder="Sube un archivo">
										</div>
									</div>

								</form>
							</div>
						</div>
					@endforeach
				</div>
			</div>


		</div>
		<div class="col-md-3 col-sm-12">

			<div class="card">
				<div class="card-header red lighten-1 white-text">
					<h5 class="d-flex justify-content-between">
						<span><i class="fas fa-users mr-2"></i>Estudiantes</span>
						<span>{{ $estudiantes->count() }}</span>
					</h5>
				</div>
				<div class="card-body">
					<ul class="list-group">
						@foreach( $estudiantes as $e )
							<li class="list-group-item">{{ $e->people->first_name }} {{ $e->people->last_name }}</li>
						@endforeach
					</ul>
				</div>
			</div>

		</div>
	</div>
</div>

{{-- MODALES --}}

<!-- Modal Editar comentario -->
<div class="modal fade" id="editcomment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar comentario</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('editarcomentario') }}" method="post" class="px-3" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="idcomment" id="commentid">
				<input type="hidden" name="postid" id="postid">
				<input type="hidden" name="peopleid" id="peopleid">

				<div class="modal-body">
					<div class="form-row">
						<div class="col md-form">
							<i class="fas fa-comment-dot prefix"></i>
							<label for="comment">Comentario</label>
							<input type="text" id="comment" name="comentario" class="form-control">
						</div>
					</div>
					<div class="form-row mt-1">
						<div class="col md-form">
							 <div class="file-field">
								<div class="btn btn-primary btn-sm float-left">
									<i class="fas fa-file-upload"></i>
									<input type="file" name="filecomment">
								</div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text" placeholder="Sube tu archivo">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-elegant btn-md" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-danger btn-md"><i class="fas fa-edit mr-2"></i>Editar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Eliminar comentario -->
<div class="modal fade" id="delcomment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('eliminarcomment') }}" method="post">
				@csrf
				<input type="hidden" name="commentid" id="commentidd">

				<div class="modal-body">
					<p class="lead text-center">¿Está seguro de eliminar éste comentario?</p>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-elegant btn-md" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-danger btn-md"><i class="fas fa-trash mr-2"></i>Eliminar</button>
				</div>
			</form>
		</div>
	</div>
</div>



<!-- Modal Editar POST -->
<div class="modal fade" id="editpost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar publicación</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('editarpublicacion') }}" method="post" class="px-3" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="postid" id="editpostid">
				<input type="hidden" name="topicid" id="topicidd">
				<input type="hidden" name="peopleid" id="editpeopleid">

				<div class="modal-body">
					<div class="form-row">
						<div class="col md-form">
							<label for="pub">Publicación</label>
							<input type="text" id="pub" name="publicacion" class="form-control">
						</div>
					</div>
					<div class="form-row mt-1">
						<div class="col md-form">
							 <div class="file-field">
								<div class="btn btn-primary btn-sm float-left">
									<i class="fas fa-file-upload"></i>
									<input type="file" name="file">
								</div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text" placeholder="Sube tu archivo">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-elegant btn-md" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-danger btn-md"><i class="fas fa-edit mr-2"></i>Editar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Eliminar POST -->
<div class="modal fade" id="delpost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('eliminarpost') }}" method="post">
				@csrf
				<input type="hidden" name="postid" id="delpostid">

				<div class="modal-body">
					<p class="lead text-center">¿Está seguro de eliminar ésta publicación?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-elegant btn-md" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-danger btn-md"><i class="fas fa-trash mr-2"></i>Eliminar</button>
				</div>
			</form>
		</div>
	</div>
</div>

@include('layouts.footer')