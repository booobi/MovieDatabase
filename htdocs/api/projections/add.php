<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieProjectionHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validateProjectionAddFields();

    $userId = UserHelpers::getUserIdByUsername($_SESSION['username']);
    MovieProjectionHelpers::addMovieProjection($userId, $_POST['name'], $_POST['duration'], $_POST['movieId'], $_POST['date'], $_POST['location']);
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Movie projection added successfully!'
        ]);
    
?>