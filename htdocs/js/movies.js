$('.rating-btn').click((event) => {
	$movieId = $(event.target).data("movieid");
	$('#rating-box').show();
	$('#rating-box').data("movieid", $movieId);
});

$('#rateSubmitBtn').click((e) => {
	e.preventDefault();
	movieId = $('#rating-box').data('movieid');
	rating = $('#ratingSelect').val();
	$.ajax({
		url: '/api/movies/rate.php',
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
	$('#rating-box').hide();
});


$('.more-btn').click((event) => {
	$('#info-container').show();
	let movieId = $(event.target).data("movieid");
	$.ajax({
		url: '/api/movies/get.php',
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
});

$('.movies-tbl .delete-btn').click(event => {
	var answer = window.confirm("Are you sure you want to delete this movie?");
	let movieId = $(event.target).data("movieid");
	if(answer) {
	$.ajax({
		url: '/api/movies/delete.php',
		type: 'POST',
		dataType: 'json',
		data: {movieId},
		success: function(data) {
				alert(data["description"]);
				if(data["status"]=="success") {
					location.reload();
				}
			}
		});
	}
});

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

const requestProjectionJoin = (projectionId) => {
	$.ajax({
		url: '/api/projections/requestJoin.php',
		type: 'POST',
		dataType: 'json',
		data: { projectionId },
		success: function(data) {
				alert(data["description"]);
				if(data["status"]=="success") {
					location.reload();
				}
			}
		});
}

const deleteProjectionJoin = (projectionId) => {
	$.ajax({
		url: '/api/projections/deleteJoin.php',
		type: 'POST',
		dataType: 'json',
		data: { projectionId },
		success: function(data) {
				alert(data["description"]);
				if(data["status"]=="success") {
					location.reload();
				}
			}
		});
}

const deleteProjection = (projectionId) => {
	$.ajax({
		url: '/api/projections/delete.php',
		type: 'POST',
		dataType: 'json',
		data: { projectionId },
		success: function(data) {
				alert(data["description"]);
				if(data["status"]=="success") {
					location.reload();
				}
			}
		});
}

getMovies = (successCb) => {
    $.ajax({
        url: '/api/movies/get.php',
        type: 'GET',
        dataType: 'json',
        success: successCb
    });
}

getProjection = (projectionId, successCb) => {
    $.ajax({
        url: '/api/projections/get.php',
        type: 'GET',
        dataType: 'json',
        data: {id: projectionId},
        success: successCb
    });
}

// const showEditProjectionForm = (projectionId) => {
// 	$('#edit-projection-container').show();
// }

function showEditProjectionForm(projectionId) {
    $('.checkbox-box, .check-mark').off();
    $("#edit-projection-container").show();
    $("#edit-projection-container").data('projectionid', projectionId);
    $('#projection-movies').empty();
    getProjection(projectionId, (projectionsResponse)=>{
        getMovies((data) => {
            data.description.forEach(movie => {
                $('#projection-movies').append(
                    '<option ' + (projectionsResponse.data.movieId == movie.Id ? 'selected ' : '') +'value=' + movie.Id + '>' + movie.Name + '</option>'
                )
            });
        });

        $('#projection-name').val(projectionsResponse.data.name);
        $('#projection-time').val(projectionsResponse.data.date);
        $('#projection-location').val(projectionsResponse.data.location);
        $('#projection-duration').val(projectionsResponse.data.duration);
        
        let participants = projectionsResponse.data.participants;
        $('#projection-participants').empty();
        participants.forEach( participant => {
            $('#projection-participants').append(
                '<label data-participantId="' + participant[0] + '" class="checkbox-box">' + participant[1] + 
                '<input' + (participant[2] == 1 ? ' checked ' : '')  + ' data-participantId="' + participant[0] + '"'
                + 'type="checkbox"><span data-participantId="' + participant[0] + '" class="check-mark"></span></label>'
            );    
        });
        
        $('.checkbox-box, .check-mark').click((event)=> {
            if(event.target != event.currentTarget) {
                return;
            }
            event.stopPropagation();
            $.ajax({
                url: '/api/projections/alterParticipant.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    projectionId,
                    participantId: $(event.target).attr('data-participantid'),
                    status: $('input[data-participantId='+ $(event.target).attr('data-participantid') + ']').attr('checked') ? 0 : 1
                },
                success: (data) => {
                    if($('input[data-participantId='+ $(event.target).attr('data-participantid') + ']').attr('checked')) {
                        $('input[data-participantId='+ $(event.target).attr('data-participantid') + ']').removeAttr('checked');
                    } else {
                        $('input[data-participantId='+ $(event.target).attr('data-participantid') + ']').attr('checked','');
                    }
                    alert(data.description); 
                }
            });
        })
        
    });
}