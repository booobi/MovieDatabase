<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieProjectionHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validateProjectionDeleteFields();

    MovieProjectionHelpers::deleteMovieProjection($_POST['projectionId']);
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Movie projection deleted successfully!'
        ]);
    
?>