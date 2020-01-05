<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/PostHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validatePostRateFields();

    $userId = UserHelpers::getUserIdByUsername($_SESSION['username']);

    $operation = PostHelpers::ratePost($userId, $_POST['postId'], $_POST['rating']);
    
    if($operation == "create") {
        echo json_encode(
            [
                'status'=>'success',
                'description'=>'You have successfully rated this post!'
            ]);
    } else {
        echo json_encode(
            [
                'status'=>'success',
                'description'=>'You have changed your rating for this post!'
            ]);
    }
    
?>