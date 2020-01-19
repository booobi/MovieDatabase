<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/PostHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/UserHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';
    ValidatorHelpers::validateUserLoggedIn();
    ValidatorHelpers::validatePostEditFields();
    
    if(isset($_POST['movieId'])) {
        ValidatorHelpers::validateUserIsAdmin();
        PostHelpers::setPostMovieId($_POST['postId'], $_POST['movieId']);
    }
    PostHelpers::editPost($_POST['postId'], $_POST['description']);
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Post edited successfully!'
        ]);
    
?>