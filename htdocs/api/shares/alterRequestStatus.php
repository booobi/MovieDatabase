<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ShareHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();

    ShareHelpers::alterRequestStatus($_POST['shareId'], $_POST['isApproved']);
        echo json_encode(
            [
                'status'=>'success',
                'description'=>'Share request altered successfully!'
            ]);
?>