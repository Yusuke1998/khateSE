$(() => {

	$('.mdb-select').materialSelect();

	new WOW().init()

	$('[data-toggle="tooltip"]').tooltip()

	$('#dtBasicExample').DataTable();
	$('.dataTables_length').addClass('bs-select');

	$('#notasdt').DataTable();
	$('.dataTables_length').addClass('mdb-select mdb-form');



	$('#topicid').change(() => {
		$('#topicidform').submit()
	})

	// MOstrar la contraseña>
	$('#reveal').mousedown(() => {
		$('#clave').attr('type', 'text')
	})
	$('#reveal').mouseup(() => {
		$('#clave').attr('type', 'password')
	})



	$('.actcert').click(function(){
		let id = $(this)[0].dataset.peopleid

		$.ajax({
			method : 'get',
			url    : 'http://127.0.0.1:8000/toggleCertificate',
			data   : { peopleid: id  }
		})

		.done((data) => {
			console.log(data)
			if ( data == 1 ) {
				toastr.success('El estudiante ahora puede descargar su certificado.')
				$('#toggle').text('Deshabilitar certificado')
			}
			else {
				toastr.info('Le has desactivado la opción del certificado.')
				$('#toggle').text('Habilitar certificado')
			}
		})

		.fail((error) => {
			toastr.error('Ha ocurrido un error')
			console.log('AJAX ERROR BELLOW')
			console.error(error)
		})
	})


	// ajax function than add new notes
	$('#notesform').submit((e) => {
		e.preventDefault()

		$.ajax({
			method : 'get',
			url    : 'http://127.0.0.1:8000/addnotas',
			data   : $('#notesform').serialize()
		})

		.done(data => {

			$('#testid').val('')
			$('#userid').val('')
			$('#nota').val('')

			if (data == 'false')
			{
				toastr.error('Esta nota ya ha sido cargada.')
				return false
			}

			toastr.success(data)

			setTimeout(() => {
				toastr.info('Recarga la página para ver los cambios.')
			}, 2000)
		})

		.fail(error => {
			console.log(error)
			toastr.error(error.statusText, 'Ha ocurrido un error')
		})

	})


	// bloquear usuario
	$('.blockuser').click(function(){
		let peopleid = $(this)[0].dataset.peopleid
		$('#desacpeopleid').val(peopleid)

		console.log($('#desacpeopleid'))
	})


	// eliminar publicacion
	$('.delpost').click(function(){
		let postid = $(this)[0].dataset.postid
		$('#delpostid').val(postid)

		console.log($('#commentid'))
	})

	// eliminar comentario
	$('.delcomment').click(function(){
		let delcomment = $(this)[0].dataset.id
		$('#commentidd').val(delcomment)
	})


	// editar publiacion
	$('.editpost').click(function(){

		let idpost = $(this)[0].dataset.postid

		$.ajax({
			url : 'http://127.0.0.1:8000/getpublicacion',
			method: 'get',
			data : { idpost : idpost }
		})

		.done((data) => {

			console.log(data)

			$('#editpostid').val(data.id)
			$('#topicidd').val(data.topic_id)
			$('#editpeopleid').val(data.people_id)
			$('#pub').val(data.post)
		})

		.fail((error) => {
			console.log(error.responseText)
		})
	})

	// editar comenetario
	$('.editcomment').click(function(){

		let idcomment = $(this)[0].dataset.id


		$.ajax({
			url : 'http://127.0.0.1:8000/getcomentario',
			method: 'get',
			data : { idcomment : idcomment }
		})

		.done((data) => {

			$('#commentid').val(data.id)
			$('#comment').val(data.comment)
			$('#peopleid').val(data.people_id)
			$('#postid').val(data.post_id)
		})

		.fail((error) => {
			console.log(error.responseText)
		})
	})

})