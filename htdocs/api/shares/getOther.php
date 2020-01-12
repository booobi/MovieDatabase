<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ShareHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();

    $userId = UserHelpers::getUserIdByUsername($_SESSION['username']);
    $res = ShareHelpers::getSharesExcludingUserId($userId);
    
    echo json_encode(
        [
            'status'=>'success',
            'data'=>$res
        ]); 
?>