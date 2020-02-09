<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validateWatchLaterFields();

    $userId = UserHelpers::getCurrentUser()->get('UserId');
    $result = MovieHelpers::addWatchLater($userId, $_POST['movieId']);
    
    if ($result === 'EXIST') {
        echo json_encode(
            [
                'status'=>'error',
                'description'=>'Movie is already part of your Watch Later list!'
            ]);
        die();
    }

    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Movie successfully added to your Watch Later list!'
        ]);
?>