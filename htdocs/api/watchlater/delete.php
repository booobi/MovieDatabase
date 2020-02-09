<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validateWatchLaterFields();

    $userId = UserHelpers::getCurrentUser()->get('UserId');
    MovieHelpers::removeWatchLater($userId, $_POST['movieId']);

    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Movie successfully removed from your Watch Later list!'
        ]);
?>