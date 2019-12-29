<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validateUserChangePasswordFields();

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    
    $userId = UserHelpers::getUserIdByUsername($_SESSION['username']);

    UserHelpers::changeUserPassword($userId, $_POST['newPassword']);

    echo json_encode(
        [
        'status'=>'success',
        'description'=>'Password changed successfully!'
        ]); 
?>