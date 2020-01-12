<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ShareHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();

    $userId = UserHelpers::getUserIdByUsername($_SESSION['username']);
    ShareHelpers::cancelRequest($userId, $_POST['shareId']);
        echo json_encode(
            [
                'status'=>'success',
                'description'=>'Share request canceled successfully!'
            ]);
?>