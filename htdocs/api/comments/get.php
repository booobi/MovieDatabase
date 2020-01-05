<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/CommentHelpers.php';

    $res = NULL;
    if(isset($_GET['id'])) {
        $res = CommentHelpers::getComment($_GET['id']);
    } else {
        $res = CommentHelpers::getComments();
    }
    
    echo json_encode(
        [
            'status'=>'success',
            'data'=>$res
        ]); 
?>