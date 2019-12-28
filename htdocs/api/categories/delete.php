<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/CategoryHelpers.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Helpers/ValidatorHelpers.php';

    
    CategoryHelpers::deleteCategory($_POST['id']);
    
    echo json_encode(
        [
            'status'=>'success',
            'description'=>'Category deleted successfully!'
        ]);
    
?>