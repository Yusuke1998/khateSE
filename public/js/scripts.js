$(() => {

	$('.mdb-select').materialSelect();

	new WOW().init()

	$('#topicid').change(() => {
		$('#topicidform').submit()
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