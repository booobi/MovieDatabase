jQuery('.close-btn').click(function () {
    $(this).parent().hide();
});

$("#new-post-form").validate({
    submitHandler: function() {
        $.ajax({
            url: '/api/posts/add.php',
            type: 'POST',
            dataType: 'json',
            data: { 
                description: $('#new-post-text').val()
            },
            success: (data) => {
                    alert(data["description"]);
                    location.reload();
                }
        });
    }   
});

$("#edit-post-form").validate({
    submitHandler: function() {
        $.ajax({
            url: '/api/posts/edit.php',
            type: 'POST',
            dataType: 'json',
            data: {
                postId: $('#edit-post-container').data('postId'),
                description: $('#edit-post-text').val(),
                movieId: $('#post-movie').val()
            },
            success: (data) => {
                    alert(data["description"]);
                    location.reload();
                }
        });
    }   
});

function showPostForm() {
     document.getElementById("new-post-container").style.display = "block";
 }

function showEditPostForm(postId) {
    $("#edit-post-container").show();
    $("#edit-post-container").data('postId', postId);
    if($("#post-movie").length) {
        $("#post-movie").empty();
        getMovies((data) => {
            data.description.forEach(movie => {
                $('#post-movie').append(
                    '<option value=' + movie.Id + '>' + movie.Name + '</option>'
                )
            });
        });
    }

    $.ajax({
        url: '/api/posts/get.php',
        type: 'GET',
        dataType: 'json',
        data: { id: $("#edit-post-container").data('postId')},
        success: (data) => {
            $('#edit-post-text').val(data.data.content);
            if($("#post-movie").length) {
                $('#post-movie').val(data.data.movieId);
            }
        }
    });
}

function showRatingForm(postId) {
    $("#rating-container").show();
    $("#rating-container").data('postId', postId);
    
    $('#rating-select').off();
    //change value
    $.ajax({
        url: '/api/posts/getRatingForMe.php',
        type: 'GET',
        dataType: 'json',
        data: { postId },
        success: (data) => {
            $('#rating-select').val(data.data);
            $('#rating-select').change(()=>{
                $.ajax({
                    url: '/api/posts/rate.php',
                    type: 'POST',
                    dataType: 'json',
                    data: { postId, rating: $('#rating-select').val()},
                    success: (dataRes) => {
                        alert(dataRes.description);
                        location.reload();
                    }
                });
            });
        }
    });
    
}

function deletePost(postId) {
    $.ajax({
        url: '/api/posts/delete.php',
        type: 'POST',
        dataType: 'json',
        data: { postId },
        success: (data) => {
                alert(data["description"]);
                location.reload();
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