<?php
    session_start();

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/MovieHelpers.php';

    if(isset($_POST['movieId'])) {
        $movie = MovieHelpers::getMovie($_POST['movieId']);
        echo json_encode(
            [
                'status'=>'success',
                'data'=>$movie
            ]); 
    } else {
        echo json_encode(
            [
                'status'=>'success',
                'description'=> MovieHelpers::getMovies()
            ]); 
    }
    
    
?>