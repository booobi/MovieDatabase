<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validateUserChangePasswordFields();

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    
    $userId = UserHelpers::getUserIdByUsername($_SESSION['username']);
    $user = UserHelpers::getUser($userId);

    if($user->get('Password') != md5($_POST['oldPassword'])) {
        echo json_encode(
            [
            'status'=>'error',
            'description'=>'Old password not correct!'
            ]);
        die();
    }


    UserHelpers::changeUserPassword($userId, $_POST['newPassword']);

    echo json_encode(
        [
        'status'=>'success',
        'description'=>'Password changed successfully!'
        ]); 
?>