$(() => {

	$('.mdb-select').materialSelect();

	new WOW().init()

	$('#topicid').change(() => {
		console.log($('#topicid'))
		console.log($('#topicidform'))
		$('#topicidform').submit()
	})

	$('.delpost').click(function(){
		let postid = $(this)[0].dataset.postid

		$('#postid').val(postid)
	})

	$('.delcomment').click(function(){
		let delcomment = $(this)[0].dataset.id

		$('#commentid').val(delcomment)
	})

})