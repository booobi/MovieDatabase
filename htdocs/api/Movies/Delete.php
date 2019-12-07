<?php
    session_start();
    // echo print_r($_SESSION);
    if(!isset($_SESSION['userLoggedIn']) || !$_SESSION['userLoggedIn']) {
        echo json_encode(
        [
            'status'=>'failure',
            'description'=>'You are not logged in or do not have required privilages for this action'
        ]);
        return;
    }

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
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