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

const addWatchLater = (movieId) => {
	$.ajax({
		url: '/api/watchlater/add.php',
		type: 'POST',
		dataType: 'json',
		data: { movieId },
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

getShare = (shareId) => successCb => {
	$.ajax({
        url: '/api/shares/get.php',
        type: 'GET',
        dataType: 'json',
        data: {id: shareId},
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

const editProjection = () => {
	$.ajax({
		url: '/api/projections/edit.php',
		type: 'POST',
		dataType: 'json',
		data: {
			projectionId: $("#edit-projection-container").data('projectionid'),
            name: $('#projection-name').val(),
            duration: $('#projection-duration').val(),
            location: $('#projection-location').val(),
            date: $('#projection-time').val(),
            movieId: $('#projection-movies').val()
		},
		success: (data) => {
			alert(data.description);
			location.reload();
		}
	});

	$('#edit-projection-container').show();
}

$('.delete-share').click((event) => {
	$.ajax({
	  url: '/api/shares/delete.php',
	  type: 'POST',
	  dataType: 'json',
	  data: {shareId: $(event.target).data("shareid")},
	  success: function(data) {
		alert(data["description"]);
		location.reload();
	  }
	});
})

$('.request-share').click((event) => {
	$.ajax({
	  url: '/api/shares/requestJoin.php',
	  type: 'POST',
	  dataType: 'json',
	  data: {shareId: $(event.target).data("shareid")},
	  success: function(data) {
		alert(data["description"]);
		location.reload();
	  }
	});
  });


  $('.cancel-request-share').click((event) => {
	$.ajax({
	  url: '/api/shares/cancelRequest.php',
	  type: 'POST',
	  dataType: 'json',
	  data: {shareId: $(event.target).data("shareid")},
	  success: function(data) {
		alert(data["description"]);
		location.reload();
	  }
	});
  });

  const editShare = (shareId) => {
	$('.checkbox-box, .check-mark').off();
    $("#edit-share-container").show();
    $("#edit-share-container").data('shareId', shareId);
	$('#share-movies').empty();

	

    getShare(shareId)(shareResponse => {
        let requests = shareResponse.data.requests;
		$('#share-requests').empty();
		
		getMovies((data) => {
			data.description.forEach(movie => {
				$('#share-movies').append(
					'<option ' + (shareResponse.data.movieId == movie.Id ? 'selected ' : '') +'value=' + movie.Id + '>' + movie.Name + '</option>'
				)
			});
		});

        requests.forEach( request => {
            $('#share-requests').append(
                '<label data-requestId="' + request.id + '" class="checkbox-box">' + request.owner.username + 
                '<input' + (request.isApproved == 1 ? ' checked ' : '')  + ' data-requestId="' + request.id + '"'
                + 'type="checkbox"><span data-requestId="' + request.id + '" class="check-mark"></span></label>'
            );    
        });
        
        $('.checkbox-box, .check-mark').click((event)=> {
            if(event.target != event.currentTarget) {
                return;
            }
            event.stopPropagation();
            $.ajax({
                url: '/api/shares/alterRequestStatus.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    shareId: $(event.target).attr('data-requestId'),
                    isApproved: $('input[data-requestId='+ $(event.target).attr('data-requestId') + ']').attr('checked') ? 0 : 1
                },
                success: (data) => {
                    if($('input[data-requestId='+ $(event.target).attr('data-requestId') + ']').attr('checked')) {
                        $('input[data-requestId='+ $(event.target).attr('data-requestId') + ']').removeAttr('checked');
                    } else {
                        $('input[data-requestId='+ $(event.target).attr('data-requestId') + ']').attr('checked','');
                    }
                    alert(data.description); 
                }
            });
        })
        
    });
}

$('#submit-share-changes').click(()=> {

	$.ajax({
		url: '/api/shares/edit.php',
		type: 'POST',
		dataType: 'json',
		data: {
			shareId: $("#edit-share-container").data('shareId'),
			movieId: $("#share-movies").val()
		},
		success: (data) => {alert(data.description); location.reload() }
	});
})