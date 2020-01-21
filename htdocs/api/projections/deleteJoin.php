<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieProjectionHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();

    $userId = UserHelpers::getCurrentUser()->get("UserId");
    MovieProjectionHelpers::deleteJoin($userId, $_POST['projectionId']);
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Participant status altered successfully!'
        ]);
    
?>