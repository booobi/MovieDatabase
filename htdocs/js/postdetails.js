$('.close-btn').click(function () {
    $(this).parent().hide();
});

function showCommentForm(postId) {
    $("#new-comment-container").show();
    $("#new-comment-form").validate({
        submitHandler: function() {
            $.ajax({
                url: '/api/comments/add.php',
                type: 'POST',
                dataType: 'json',
                data: { 
                    postId,
                    content: $('#new-comment-text').val()
                },
                success: (data) => {
                        alert(data["description"]);
                        location.reload();
                    }
            });
        }   
    });
}

function showEditCommentForm(commentId) {
    $("#edit-comment-container").show();

    $.ajax({
        url: '/api/comments/get.php',
        type: 'GET',
        dataType: 'json',
        data: { id: commentId },
        success: (data) => {
            $('#edit-comment-text').val(data.data.content);
        }
    });

    $("#edit-comment-form").validate({
        submitHandler: function() {
            $.ajax({
                url: '/api/comments/edit.php',
                type: 'POST',
                dataType: 'json',
                data: { 
                    commentId,
                    content: $('#edit-comment-text').val()
                },
                success: (data) => {
                    alert(data["description"]);
                    location.reload();
                }
            });
        }   
    });
}

const deleteComment = (commentId) => {
    $.ajax({
        url: '/api/comments/delete.php',
        type: 'POST',
        dataType: 'json',
        data: { commentId },
        success: (data) => {
                alert(data["description"]);
                location.reload();
            }
    });
}