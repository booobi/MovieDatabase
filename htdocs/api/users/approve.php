<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserIsAdmin();
    ValidatorHelpers::validateUserApprovalFields();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    
    UserHelpers::alterUserApproval($_POST['userId'], $_POST['isApproved']);
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'User approved successfully!'
        ]); 
?>