<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/PostHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();

    $userId = UserHelpers::getCurrentUser()->get("UserId");
    
    echo json_encode(
        [
            'status'=>'success',
            'data'=>PostHelpers::getPostRatingForUser($_GET['postId'], $userId)
        ]);
    
?>