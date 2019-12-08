<?php
    session_start();

    if(!isset($_SESSION['userLoggedIn']) || !$_SESSION['userLoggedIn']) {
        echo json_encode(
        [
            'status'=>'failure',
            'description'=>'You are not logged in or do not have required privilages for this action'
        ]);
        return;
    }

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';

    $userId = UserHelpers::getUserIdByUsername($_SESSION["username"]);

    $operation = MovieHelpers::rateMovie($userId, $_POST['movieId'], $_POST['rating']);
    if($operation == "create") {
        echo json_encode(
            [
                'status'=>'success',
                'description'=>'You have successfully rated this movie!'
            ]);
    } else {
        echo json_encode(
            [
                'status'=>'success',
                'description'=>'You have changed your rating for this movie!'
            ]);
    }
?>