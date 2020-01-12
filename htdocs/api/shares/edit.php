<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ShareHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();

    $res = ShareHelpers::editShare($_POST['shareId'], $_POST['movieId']);
    if($res == 'exists') {
        echo json_encode(
            [
                'status'=>'error',
                'description'=>'Share by you for this movie already exists'
            ]);
        die();
    }
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Share edited successfully!'
        ]);
?>