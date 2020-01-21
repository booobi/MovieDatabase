function showComments() {
    document.getElementById("comments-container").style.display = "block";
}
function showProjectionForm() {
    $('.checkbox-box, .check-mark').off();
    document.getElementById("new-projection-container").style.display = "block";
    $('#projection-movieId').empty();
    getMovies((data) => {
                data.description.forEach(movie => {
                    $('#projection-movieId').append(
                        '<option value=' + movie.Id + '>' + movie.Name + '</option>'
                    )
                });
            });
}
function showEditProjForm(projectionId) {
    $('.checkbox-box, .check-mark').off();
    $("#edit-projection-container").show();
    $("#edit-projection-container").data('projectionid', projectionId);
    $('#edit-projection-movieId').empty();
    getProjection(projectionId, (projectionsResponse)=>{
        getMovies((data) => {
            data.description.forEach(movie => {
                $('#edit-projection-movieId').append(
                    '<option ' + (projectionsResponse.data.movieId == movie.Id ? 'selected ' : '') +'value=' + movie.Id + '>' + movie.Name + '</option>'
                )
            });
        });

        $('#edit-projection-name').val(projectionsResponse.data.name);
        $('#edit-projection-time').val(projectionsResponse.data.date);
        $('#edit-projection-location').val(projectionsResponse.data.location);
        $('#edit-projection-duration').val(projectionsResponse.data.duration);
        
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

function deleteShare(shareId) {
    $.ajax({
        url: '/api/shares/delete.php',
        type: 'POST',
        dataType: 'json',
        data: { shareId },
        success: (data) => {
                alert(data["description"]);
                location.reload();
        }
    });
}

function showShareForm() {
    $('.checkbox-box, .check-mark').off();
    document.getElementById("new-share-container").style.display = "block";
    $('#newShareMovie').empty();
    getMovies((data) => {
                data.description.forEach(movie => {
                    $('#newShareMovie').append(
                        '<option value=' + movie.Id + '>' + movie.Name + '</option>'
                    )
                });
            });
}

function showEditShareForm(shareId) {
    $('#edit-share-container').data('shareId', shareId);
    $('.checkbox-box, .check-mark').off();
    document.getElementById("edit-share-container").style.display = "block";
    getShare(shareId, (shareResponse) => {
        getMovies((moviesRes) => {
            moviesRes.description.forEach(movie => {
                $('#editShareMovie').append(
                    '<option ' + (shareResponse.data.movieId == movie.Id ? 'selected ' : '') +'value=' + movie.Id + '>' + movie.Name + '</option>'
                )
            });
        });

    getShareRequests(shareId, shareResponse => {
        let shares = shareResponse.data;
        $('#shareParticipants').empty();
        shares.forEach( share => {
            $('#shareParticipants').append(
                '<label data-shareid="' + share.id + '" class="checkbox-box">' + share.owner.username + 
                '<input' + (share.isApproved ? ' checked ' : '')  + ' data-shareid="' + share.id + '"'
                + 'type="checkbox"><span data-shareid="' + share.id + '"  class="check-mark"></span></label>'
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
                    shareId: $(event.target).attr('data-shareid'),
                    isApproved: $('input[data-shareid='+ $(event.target).attr('data-shareid') + ']').attr('checked') ? 0 : 1
                },
                success: (data) => {
                    if($('input[data-shareid='+ $(event.target).attr('data-shareid') + ']').attr('checked')) {
                        $('input[data-shareid='+ $(event.target).attr('data-shareid') + ']').removeAttr('checked');
                    } else {
                        $('input[data-shareid='+ $(event.target).attr('data-shareid') + ']').attr('checked','');
                    }
                    alert(data.description); 
                }
            });
        })
    });


});
}

function deleteShare(shareId) {
    $.ajax({
        url: '/api/shares/delete.php',
        type: 'POST',
        dataType: 'json',
        data: { shareId },
        success: (data) => {
                alert(data["description"]);
                location.reload();
        }
    });
}

$("#new-share-form").validate({
    submitHandler: function() {
        $.ajax({
            url: '/api/shares/add.php',
            type: 'POST',
            dataType: 'json',
            data: { movieId: $('#newShareMovie').val()},
            success: (data) => {
                    alert(data["description"]);
                    $("#new-share-form").trigger('reset');
                    location.reload();
                }
        });
    }   
});

$("#submit-share-changes").click(()=>{
    let shareId = $('#edit-share-container').data('shareId');
    $.ajax({
        url: '/api/shares/edit.php',
        type: 'POST',
        dataType: 'json',
        data: { 
            shareId,
            movieId: $('#editShareMovie').val()
        },
        success: (data) => {
                alert(data["description"]);
                location.reload();
                }
        });
})

$("#new-projection-form").validate({
    submitHandler: function() {
        $.ajax({
            url: '/api/projections/add.php',
            type: 'POST',
            dataType: 'json',
            data: { 
                name: $('#projection-name').val(),
                duration: $('#projection-duration').val(),
                location: $('#projection-location').val(),
                date: $('#projection-time').val(),
                movieId: $('#projection-movieId').val()
            },
            success: (data) => {
                    alert(data["description"]);
                    $("#new-projection-form").trigger('reset');
                    location.reload();
                    }
            });
    }
  });

  $('#submit-projection-changes').click(()=>{
    let projectionId = $("#edit-projection-container").data('projectionid');
    $.ajax({
        url: '/api/projections/edit.php',
        type: 'POST',
        dataType: 'json',
        data: { 
            projectionId,
            name: $('#edit-projection-name').val(),
            duration: $('#edit-projection-duration').val(),
            location: $('#edit-projection-location').val(),
            date: $('#edit-projection-time').val(),
            movieId: $('#edit-projection-movieId').val()
        },
        success: (data) => {
                alert(data["description"]);
                $("#new-projection-form").trigger('reset');
                location.reload();
                }
        });
  });

  deleteProjection = (projectionId) => {
    $.ajax({
        url: '/api/projections/delete.php',
        type: 'POST',
        dataType: 'json',
        data: { projectionId },
        success: (data) => {
                alert(data["description"]);
                location.reload();
            }
        });
  }


$(document).ready( () => {
    $("#details-form").validate({
        submitHandler: function() {
            $.ajax({
                url: '/api/users/changeDetails.php',
                type: 'POST',
                dataType: 'json',
                data: { 
                    email: $('#details-email').val(),
                    firstName: $('#details-firstname').val(),
                    lastName: $('#details-lastname').val()
                },
                success: (data) => {
                        alert(data["description"]);
                        $("#details-form").trigger('reset');
                        // location.reload();
                        }
                });
            }
      });  
});

$("#password-form").validate({
    submitHandler: function() {
        if( $('#password-firstname').val() !=  $('#password-lastname').val()) {
            alert("Passwords do not match!");
            return;
        }
        $.ajax({
            url: '/api/users/changePassword.php',
            type: 'POST',
            dataType: 'json',
            data: { 
                oldPassword: $('#password-email').val(),
                newPassword: $('#password-lastname').val()
            },
            success: (data) => {
                    alert(data["description"]);
                    $("#password-form").trigger('reset');
                    location.reload();
                    }
            });
    }
});


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

getShare = (shareId, successCb) => {
    $.ajax({
        url: '/api/shares/get.php',
        type: 'GET',
        dataType: 'json',
        data: { id: shareId },
        success: successCb
    });
}

getShareRequests = (shareId, successCb) => {
    $.ajax({
        url: '/api/shares/getShareRequests.php',
        type: 'POST',
        dataType: 'json',
        data: { shareId },
        success: successCb
    });
}