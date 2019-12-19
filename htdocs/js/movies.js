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

function showRatingModal(movieId) {
	$('#rating-box').show();
	$('#rating-box').data('movieId', movieId);
}

function showInfoModal(movieId) {
	$('#info-container').show();
	$.ajax({
		url: '/api/Movies/Get.php',
		type: 'POST',
		dataType: 'json',
		data: {movieId},
		success: function(res) {
			if(res.data) {
				const movie = res.data;
				$('#directorText').text(movie.Director.firstName + " " + movie.Director.lastName);
				
				$('#awardsText').text(movie.Awards || "None");
				
				$('#musicText').text(movie.MusicStudio);
				
				$('#companyText').text(movie.MovieStudio);
				
				$('#languageText').text(movie.Language);
				
				$('#releaseDateText').text(movie.ReleaseDate);
				
				$('#trailerText').append($.parseHTML('<a href = "' + movie.TrailerSrc + '" target="_blank">Open</a>'));

				$('#durationText').text(movie.Duration);

				$('#countryText').text(movie.Country);

				$('#imdbRatingText').text(movie.IMDBRating);

				movie.Actors.filter(actor => !actor.isMainActor).forEach(actor => {
					$('#actorsText').append(actor.firstName + " " + actor.lastName + ", ");
				});

				movie.Actors.filter(actor => actor.isMainActor).forEach(actor => {
					$('#mainActorsText').append(actor.firstName + " " + actor.lastName + ", ");
				})

				$('#descriptionText').text(movie.Description);
			} else {
				alert(res.reason);
			}
		}
	});
}

$('.close-btn').click(e => {
	$('#directorText').empty();
	$('#awardsText').empty();
	$('#musicText').empty();
	$('#companyText').empty();
	$('#languageText').empty();
	$('#releaseDateText').empty();
	$('#trailerText').empty();
	$('#durationText').empty();
	$('#countryText').empty();
	$('#imdbRatingText').empty();
	$('#actorsText').empty();
	$('#mainActorsText').empty();
	$('#descriptionText').empty();

	$(e.target).parent().hide();
});

$('#rateSubmitBtn').click((e) => {
	e.preventDefault();
	movieId = $('#rating-box').data('movieId');
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