<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/CommentHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validateCommentAlterisActiveFields();

    CommentHelpers::setIsActiveState($_POST['commentId'], $_POST['isActive']);
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Comment status edited successfully!'
        ]);
    
?>