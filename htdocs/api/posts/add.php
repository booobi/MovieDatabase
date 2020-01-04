<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/PostHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validatePostAddFields();

    $userId = UserHelpers::getUserIdByUsername($_SESSION['username']);
    echo UserHelpers::getUserIdByUsername($_SESSION['username']);
    PostHelpers::addPost($userId, $_POST['description']);
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Post added successfully!'
        ]);
    
?>