<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/PostHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validatePostEditFields();
    
    PostHelpers::editPost($_POST['postId'], $_POST['description']);
    if(isset($_POST['movieId'])) {
        PostHelpers::setPostMovieId($_POST['movieId']);
    }
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Post edited successfully!'
        ]);
    
?>