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
				$('#directorText').text(movie.Director ? (movie.Director.firstName + " " + movie.Director.lastName) : "None");
				
				$('#awardsText').text(movie.Awards || "None");
				
				$('#musicText').text(movie.MusicStudio);
				
				$('#companyText').text(movie.MovieStudio);
				
				$('#languageText').text(movie.Language);
				
				$('#releaseDateText').text(movie.ReleaseDate);
				
				$('#trailerText').append($.parseHTML('<a href = "' + movie.TrailerSrc + '" target="_blank">Open</a>'));

				$('#durationText').text(movie.Duration);

				$('#countryText').text(movie.Country);

				$('#imdbRatingText').text(movie.IMDBRating);

				const nonMainActors = movie.Actors.filter(actor => !actor.isMainActor);
				const actorsText = nonMainActors.reduce((acc, val) => {
					return acc + val.firstName + " " + val.lastName 
					+ ((nonMainActors.indexOf(val) == nonMainActors.length - 1) ? "" : ", ")
				}, "");
				$('#actorsText').text(actorsText);

				const mainActors = movie.Actors.filter(actor => actor.isMainActor);
				const mainActorsText = mainActors.reduce((acc, val) => {
					return acc + val.firstName + " " + val.lastName 
					+ ((mainActors.indexOf(val) == mainActors.length - 1) ? "" : ", ")
				}, "");
				
				$('#mainActorsText').text(mainActorsText);
				
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