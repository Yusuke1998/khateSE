$(() => {

	$('.mdb-select').materialSelect();

	new WOW().init()

	$('[data-toggle="tooltip"]').tooltip()

	$('#dtBasicExample').DataTable();
	$('.dataTables_length').addClass('bs-select');

	$('#dtstudents').DataTable();
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

	// eliminar publicacion
	$('.delpost').click(function(){
		let postid = $(this)[0].dataset.postid
		$('#delpostid').val(postid)

		console.log($('#commentid'))
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

	CKEDITOR.replace('publicartext');

	$('.img').click(function(e){
		let h = $(this).children()
		$('#targettitulo').text(h[1].firstElementChild.innerText)
		$('#targetimg').attr('src', h[0].firstElementChild.src)
		$('#targettopic').text(h[1].children[1].innerText)
		$('#targetcontenido').text(h[1].lastElementChild.innerText)
	})

	// $('.btnmodalcontent').click(function(){
	// 	let a = $(this).parent().parent()
	// 	$('#modal-title-1').text(a.children('div.w-100').children('h5').text())
	// 	$('#modal-content-1').html(a.children('p.content').text())
	// 	console.log(a.children('p.content').text())
	// })

	// $('.btnmodalcontent2').click(function(){
	// 	$('#modal-title-2').text('Hola Mundo')
	// 	$('#modal-content-2').html('Hola Mundo')
	// })

})