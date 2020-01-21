<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieProjectionHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validateProjectionDeleteFields();

    $userId = UserHelpers::getCurrentUser()->get("UserId");
    $res = MovieProjectionHelpers::requestJoin($userId, $_POST['projectionId']);
    
    if($res) {
        echo json_encode(
            [
                'status'=>'success',
                'description'=>'Projection join requested successfully!'
            ]);
    } else {
        echo json_encode(
            [
                'status'=>'error',
                'description'=>'Join request already exists!'
            ]);
    }
    
    
?>