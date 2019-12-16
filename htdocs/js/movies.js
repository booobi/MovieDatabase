function deleteMovie(id) {
	var answer = window.confirm("Are you sure you want to delete this movie?");
	
	if(answer) {
		$.ajax({
			url: '/api/Movies/Delete.php',
			type: 'POST',
			dataType: 'json',
			data: {movieId: id},
			success: function(data) {
                    alert(data["description"]);
                    if(data["status"]=="success") {
                        location.reload();
                    }
				}
			});
	}
}

function openRatingModal(movieId) {
	$('#rating_modal').show();
	$('#rating_modal').data('movieId', movieId);
}

$('#rateSubmitBtn').click((e) => {
	e.preventDefault();
	movieId = $('#rating_modal').data('movieId');
	rating = $('#rateSelect').val();
	$.ajax({
		url: '/api/Movies/Rate.php',
		type: 'POST',
		dataType: 'json',
		data: {rating, movieId},
		success: function(data) {
				alert(data["description"]);
				if(data["status"]=="success") {
					location.reload();
				}
			}
		});
	$('#rating_modal').hide();
});