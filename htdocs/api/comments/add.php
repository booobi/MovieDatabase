<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/CommentHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validateCommentAddFields();

    $userId = UserHelpers::getUserIdByUsername($_SESSION['username']);

    if(!isset($_POST['parentCommentId'])) {
        CommentHelpers::addComment($userId, $_POST['postId'], $_POST['content']);
    } else {
        CommentHelpers::addCommentReply($userId, $_POST['postId'], $_POST['parentCommentId'], $_POST['content']);
    }

    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Comment added successfully!'
        ]);
    
?>