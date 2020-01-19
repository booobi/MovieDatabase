<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieProjectionHelpers.php';

    $res = NULL;
    if(isset($_GET['id'])) {
        $res = MovieProjectionHelpers::getMovieProjection($_GET['id']);
    } else {
        $res = MovieProjectionHelpers::getMovieProjections();
    }
    
    echo json_encode(
        [
            'status'=>'success',
            'data'=>$res
        ]); 
?>