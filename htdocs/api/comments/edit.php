<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/CommentHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validateCommentEditFields();

    CommentHelpers::editComment($_POST['commentId'], $_POST['content']);

    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Comment edited successfully!'
        ]);
    
?>