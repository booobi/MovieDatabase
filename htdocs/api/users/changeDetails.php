<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validateUserChangeDetailsFields();

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    
    $userId = UserHelpers::getUserIdByUsername($_SESSION['username']);

    UserHelpers::changeUserDetails($userId, $_POST['firstName'], $_POST['lastName'], $_POST['email']);
    $_SESSION['username'] = $_POST['email'];
    echo json_encode(
        [
        'status'=>'success',
        'description'=>'Details changed successfully!'
        ]); 
?>