<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/CommentHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validateCommentDeleteFields();

    CommentHelpers::deleteComment($_POST['commentId']);

    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Comment edited successfully!'
        ]);
    
?>