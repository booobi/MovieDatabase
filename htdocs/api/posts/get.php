<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/PostHelpers.php';

    $res = NULL;
    if(isset($_GET['id'])) {
        $res = PostHelpers::getPost($_GET['id']);
    } else {
        $res = PostHelpers::getPosts();
    }
    
    echo json_encode(
        [
            'status'=>'success',
            'data'=>$res
        ]); 
?>