<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserIsAdmin();
    
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/FestivalHelpers.php';

    $res = NULL;
    if(isset($_GET['id'])) {
        $res = FestivalHelpers::getFestival($_GET['id']);
    } else {
        $res = FestivalHelpers::getFestivals();
    }
    
    echo json_encode(
        [
            'status'=>'success',
            'data'=>$res
        ]); 
?>