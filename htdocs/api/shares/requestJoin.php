<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ShareHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validateShareRequestJoinFields();

    $userId = UserHelpers::getUserIdByUsername($_SESSION['username']);
    $res = ShareHelpers::makeRequest($userId, $_POST['shareId']);
    if($res == 'invalid') {
        echo json_encode(
            [
                'status'=>'error',
                'description'=>'ShareId is not a main share!'
            ]);
    } else if ($res == 'exists'){
        echo json_encode(
            [
                'status'=>'error',
                'description'=>'Share request already exists!'
            ]);
    } else {
        echo json_encode(
            [
                'status'=>'success',
                'description'=>'Share request sent successfully!'
            ]);
    }
    
    
?>