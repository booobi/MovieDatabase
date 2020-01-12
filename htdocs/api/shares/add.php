<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ShareHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validateShareAddFields();

    $userId = UserHelpers::getUserIdByUsername($_SESSION['username']);

    //check to see if share already exists
    if(ShareHelpers::mainShareByUserForMovieExists($userId, $_POST['movieId'])) {
        echo json_encode(
            [
                'status'=>'success',
                'description'=>'Share created by you for this movie already exists!'
            ]);
        die();
    }

    ShareHelpers::addShare($userId, $_POST['movieId']);
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Share added successfully!'
        ]);
    
?>