<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ShareHelpers.php';

    $res = NULL;
    if(isset($_GET['id'])) {
        $res = ShareHelpers::getShare($_GET['id']);
    } else {
        $res = ShareHelpers::getMainShares();
    }
    
    echo json_encode(
        [
            'status'=>'success',
            'data'=>$res
        ]); 
?>