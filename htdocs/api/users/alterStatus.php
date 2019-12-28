<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserIsAdmin();
    ValidatorHelpers::validateUserAlterStatusFields();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    
    UserHelpers::alterUserStatus($_POST['id'], $_POST['isActive']);
    
    echo json_encode(
        [
            'status'=>'success'
        ]); 
?>