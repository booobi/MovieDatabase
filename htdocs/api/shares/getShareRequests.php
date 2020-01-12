<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ShareHelpers.php';

    ValidatorHelpers::validateShareRequestJoinFields();

    $res = ShareHelpers::getRequestsForShare($_POST['shareId']);
    
    echo json_encode(
        [
            'status'=>'success',
            'data'=>$res
        ]); 
?>