<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/PostHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validatePostDeleteFields();

    $userId = UserHelpers::getUserIdByUsername($_SESSION['username']);
    PostHelpers::deletePost($_POST['postId']);
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Post deleted successfully!'
        ]);
    
?>