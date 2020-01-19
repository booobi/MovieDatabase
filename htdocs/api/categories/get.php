<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/CategoryHelpers.php';

    $res = "";
    if(isset($_GET['id'])) {
        $res = CategoryHelpers::getCategory($_GET['id']);
    } else {
        $res = CategoryHelpers::getAllCategories();
    }

    echo json_encode(
        [
            'status'=>'success',
            'data'=>$res
        ]); 
?>