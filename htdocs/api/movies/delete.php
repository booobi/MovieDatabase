<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    UserHelpers::validateUserLoggedIn();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieHelpers.php';

    $ownedMovies = UserHelpers::getUserOwnedMovies($_SESSION['username']);

    //if user is admin or owns the movie -> Delete
    if((isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) || in_array($_POST['movieId'], $ownedMovies)) {
        MovieHelpers::DeleteMovie($_POST['movieId']);
        echo json_encode(
            [
                'status'=>'success',
                'description'=>'Movie deleted successfully!'
            ]); 
    }
?>